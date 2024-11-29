<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\RoleSeeder;
use Database\Seeders\SiteThemeSeeder;
use Database\Seeders\OfferSeeder;
use Database\Seeders\OfferSubscriptionSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\OfferSubscriptionRefLogSeeder;

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
        $this->call(OfferSubscriptionSeeder::class);
        $this->call(OfferSubscriptionRefLogSeeder::class);
    }
}
