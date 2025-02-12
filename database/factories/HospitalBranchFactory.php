<?php

namespace Database\Factories;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Hospital;
use App\Models\HospitalBranch;

class HospitalBranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = HospitalBranch::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'hospital_id' => Hospital::factory(),
            'city_id' => City::factory(),
            'doctor_id' => Doctor::factory(),
            'name' => $this->faker->name(),
            'type' => $this->faker->randomElement(['Hospital' , 'Clinic']),
            'phone_number' => $this->faker->phoneNumber(),
            'time' => json_encode(["Tue","Wed","Thu","Fri","Sat","Sun"]),
            'address' => $this->faker->word(),
            'whatsapp_number' => $this->faker->word(),
            'discount' => $this->faker->numberBetween(-10000, 10000),
            'latitude' => $this->faker->latitude(),
            'longitude' => $this->faker->longitude(),
            'facilities' => $this->faker->word(),
            'image' => '01JKE01TAHQJ8GCFFJ5Y6R5HT4.jpg',
            'images' => "[\"01JKE01TAQZHJVFF7JR37247FZ.jpg\",\"01JKE01TATZ999NP6QGFWMN6KN.jpg\"]",
            'ad_tag' => $this->faker->boolean(),
        ];
    }
}
