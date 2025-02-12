<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Department;
use App\Models\Subdepartment;
use App\Models\User;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'department_id' => Department::factory(),
            'subdepartment_id' => Subdepartment::factory(),
            'name' => $this->faker->name(),
            'age' => $this->faker->numberBetween(-10000, 10000),
            'email' => $this->faker->safeEmail(),
            'gender' => $this->faker->word(),
            'password' => $this->faker->password(),
            'phone_number' => $this->faker->phoneNumber(),
            'type' => $this->faker->word(),
        ];
    }
}
