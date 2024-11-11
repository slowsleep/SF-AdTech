<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Advertiser;
use App\Models\Webmaster;
use App\Models\User;
use App\Models\Role;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * The current password being used by the factory.
     */
    protected static ?string $password;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => static::$password ??= Hash::make('password'),
            'remember_token' => Str::random(10),
            'role_id' => DB::table('roles')->inRandomOrder()->where('name', '!=', 'admin')->first()->id,
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }

    public function configure()
    {
        return $this->afterCreating(function (User $user) {
            $role = $user->role_id;
            $role = Role::find($role)->name;

            if ($role === 'advertiser') {
                Advertiser::factory()->create([
                    'user_id' => $user->id,
                    'name' => fake()->company
                ]);
            } else if ($role === 'webmaster') {
                Webmaster::factory()->create([
                    'user_id' => $user->id,
                    'site' => fake()->url
                ]);
            }
        });
    }
}
