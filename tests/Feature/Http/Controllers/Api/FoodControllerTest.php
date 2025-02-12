<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\FoodController
 */
final class FoodControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $food = Food::factory()->count(3)->create();

        $response = $this->get(route('food.branches'));
    }
}
