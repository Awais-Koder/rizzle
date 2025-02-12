<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FoodBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FoodBranchController
 */
final class FoodBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $foodBranches = FoodBranch::factory()->count(3)->create();

        $response = $this->get(route('food-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $foodBranch = FoodBranch::factory()->create();

        $response = $this->get(route('food-branches.show', $foodBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
