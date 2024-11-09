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
        $this->call(RoleSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(SiteThemeSeeder::class);
        $this->call(OfferSeeder::class);
        $this->call(WebmasterOfferSeeder::class);
    }
}
