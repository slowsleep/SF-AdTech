<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Webmaster;
use App\Models\Offer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferSubscription>
 */
class OfferSubscriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $usedPairs = []; // Хранилище уникальных пар

        do {
            $webmasterId = Webmaster::all()->random()->user_id;
            $offerId = Offer::all()->random()->id;
            $pair = "{$webmasterId}-{$offerId}";
        } while (in_array($pair, $usedPairs)); // Проверка на уникальность

        $usedPairs[] = $pair;

        return [
            'webmaster_id' => $webmasterId,
            'offer_id' => $offerId,
            'ref_link_uuid' => fake()->uuid(),
        ];
    }
}
