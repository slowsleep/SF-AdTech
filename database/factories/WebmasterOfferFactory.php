<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Webmaster;
use App\Models\Offer;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class WebmasterOfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'webmaster_id' => Webmaster::all()->random()->user_id,
            'offer_id' => Offer::all()->random()->id
        ];
    }
}
