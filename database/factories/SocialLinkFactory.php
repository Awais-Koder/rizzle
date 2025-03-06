<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\SocialLink;

class SocialLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SocialLink::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'youtube_link' => fake()->word(),
            'facebook_link' => fake()->word(),
            'insta_link' => fake()->word(),
            'tiktok_link' => fake()->word(),
        ];
    }
}
