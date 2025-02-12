<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Advertisement;

class AdvertisementFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Advertisement::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'home_banner' => '{}',
            'sponsor_video' => '{}',
            'education_ad' => '{}',
            'travel_ad' => '{}',
            'food_ad' => '{}',
            'shop_ad' => '{}',
        ];
    }
}
