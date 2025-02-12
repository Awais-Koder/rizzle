<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Doctor;
use App\Models\DoctorCategory;

class DoctorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Doctor::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'doctor_category_id' => DoctorCategory::factory(),
            'fees' => $this->faker->numberBetween(-10000, 10000),
            'name' => $this->faker->name(),
            'reviews' => $this->faker->text(),
            'short_description' => $this->faker->word(),
            'about_me' => $this->faker->text(),
            'experience' => $this->faker->text(),
            'schedule' => json_encode(["Tue", "Wed", "Thu", "Fri", "Sat", "Sun"]),
            'address' => $this->faker->word(),
            'whatsapp' => $this->faker->word(),
            'phone' => $this->faker->phoneNumber(),
            'image' => '01JKE01TAHQJ8GCFFJ5Y6R5HT4.jpg',
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'video_youtube_link' => $this->faker->word(),
            'ad_tag' => $this->faker->boolean(),
        ];
    }
}
