<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = Role::all();

        for ($i = 0; $i < count($roles); $i++) {
            User::factory()->create([
                'role_id' => $roles[$i]->id,
            ]);
        }

        User::factory(10)->create();
    }
}
