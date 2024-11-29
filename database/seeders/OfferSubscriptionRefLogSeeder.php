<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\OfferSubscriptionRefLog;

class OfferSubscriptionRefLogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        OfferSubscriptionRefLog::factory()->count(10)->create();
    }
}
