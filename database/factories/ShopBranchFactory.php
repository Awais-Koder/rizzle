<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\City;
use App\Models\Shop;
use App\Models\ShopBranch;

class ShopBranchFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopBranch::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'city_id' => City::factory(),
            'shop_id' => Shop::factory(),
            'name' => $this->faker->name(),
            'image' => $this->faker->word(),
            'product_name' => $this->faker->word(),
            'old_price' => $this->faker->numberBetween(-10000, 10000),
            'new_price' => $this->faker->numberBetween(-10000, 10000),
            'images' => '{}',
            'ad_tag' => $this->faker->boolean(),
        ];
    }
}
