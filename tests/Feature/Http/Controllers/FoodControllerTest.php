<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Food;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FoodController
 */
final class FoodControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $food = Food::factory()->count(3)->create();

        $response = $this->get(route('food.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $food = Food::factory()->create();

        $response = $this->get(route('food.show', $food));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
