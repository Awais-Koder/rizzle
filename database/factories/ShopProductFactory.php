<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Shop;
use App\Models\ShopProduct;

class ShopProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ShopProduct::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'shop_id' => Shop::factory(),
            'old_price' => $this->faker->numberBetween(-10000, 10000),
            'new_price' => $this->faker->numberBetween(-10000, 10000),
            'images' => "[\"01JKE01TAQZHJVFF7JR37247FZ.jpg\",\"01JKE01TATZ999NP6QGFWMN6KN.jpg\"]",
        ];
    }
}
