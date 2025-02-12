<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\GovOffice;

class GovOfficeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = GovOffice::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'name' => $this->faker->name(),
            'time' => json_encode(["Tue","Wed","Thu","Fri","Sat","Sun"]),
            'phone_number' => $this->faker->phoneNumber(),
            'address' => $this->faker->word(),
            'whatsapp_number' => $this->faker->word(),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'image' => '01JKE01TAHQJ8GCFFJ5Y6R5HT4.jpg',
            'images' => "[\"01JKE01TAQZHJVFF7JR37247FZ.jpg\",\"01JKE01TATZ999NP6QGFWMN6KN.jpg\"]",
            'ad_tag' => $this->faker->boolean(),
        ];
    }
}
