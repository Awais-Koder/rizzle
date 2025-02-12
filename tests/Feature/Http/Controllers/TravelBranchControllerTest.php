<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\TravelBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TravelBranchController
 */
final class TravelBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $travelBranches = TravelBranch::factory()->count(3)->create();

        $response = $this->get(route('travel-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $travelBranch = TravelBranch::factory()->create();

        $response = $this->get(route('travel-branches.show', $travelBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
