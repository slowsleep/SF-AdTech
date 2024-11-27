<?php

namespace Database\Factories;

use App\Models\OfferSubscription;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\OfferTracking>
 */
class OfferTrackingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        static $usedOfferSubscription = [];

        do {
            $offerSubscription = OfferSubscription::all()->random()->id;
        } while (in_array($offerSubscription, $usedOfferSubscription));

        $usedOfferSubscription[] = $offerSubscription;

        return [
            'offer_subscription_id' => $offerSubscription,
            'clicks' => $this->faker->numberBetween(0, 10),
        ];
    }
}
