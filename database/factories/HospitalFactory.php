<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Doctor;
use App\Models\Hospital;

class HospitalFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Hospital::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'doctor_id' => Doctor::factory(),
            'type' => fake()->word(),
            'name' => fake()->name(),
            'phone_number' => fake()->phoneNumber(),
            'time' => json_encode(["Tue","Wed","Thu","Fri","Sat","Sun"]),
            'address' => fake()->word(),
            'whatsapp_number' => fake()->word(),
            'discount' => fake()->numberBetween(-10000, 10000),
            'latitude' => fake()->latitude(),
            'longitude' => fake()->longitude(),
            'facilities' => fake()->text(),
            'image' => '01JKE01TAHQJ8GCFFJ5Y6R5HT4.jpg',
            'images' => "[\"01JKE01TAQZHJVFF7JR37247FZ.jpg\",\"01JKE01TATZ999NP6QGFWMN6KN.jpg\"]",
            'ad_tag' => fake()->boolean(),
        ];
    }
}
