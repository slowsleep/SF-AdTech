<?php

namespace Database\Factories;

use App\Models\Advertiser;
use App\Models\SiteTheme;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Offer>
 */
class OfferFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'advertiser_id' => Advertiser::all()->random()->user_id,
            'title' => fake()->title(),
            'price' => fake()->randomFloat(2, 0, 100),
            'url' => fake()->url(),
            'theme_id' => SiteTheme::all()->random()->id,
            'active' => fake()->boolean(),
        ];
    }
}
