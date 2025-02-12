<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FoodCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FoodCategoryController
 */
final class FoodCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $foodCategories = FoodCategory::factory()->count(3)->create();

        $response = $this->get(route('food-categories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $foodCategory = FoodCategory::factory()->create();

        $response = $this->get(route('food-categories.show', $foodCategory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
