<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SiteThemeSeeder;
use Illuminate\Support\Facades\Hash;
use Database\Seeders\OfferSeeder;
use Database\Seeders\WebmasterOfferSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $this->call(RoleSeeder::class);

        $this->call(UserSeeder::class);

        User::factory()->create([
            'name' => 'Admin',
            'password' => Hash::make('admin123'),
            'email' => 'admin@example.com',
            'role_id' => Role::where('name', '=', 'admin')->get()->id,
        ]);

        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
            'password' => Hash::make('test123'),
        ]);

        $this->call(SiteThemeSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(WebmasterOfferSeeder::class);

    }
}
