<?php

namespace Database\Seeders;

use Carbon\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Webmaster;
// use Database\Factories\WebmastersOffersFactory;
//
use App\Models\WebmasterOffer;

class WebmasterOfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        WebmasterOffer::factory()->count(10)->create();
    }
}
