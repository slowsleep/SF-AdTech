<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['admin', 'advertiser', 'webmaster'];

        for ($i = 0; $i < count($roles); $i++) {
            Role::factory()->create([
                'name' => $roles[$i]
            ]);
        }
    }
}
