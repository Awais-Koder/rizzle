<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FitnessBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FitnessBranchController
 */
final class FitnessBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $fitnessBranches = FitnessBranch::factory()->count(3)->create();

        $response = $this->get(route('fitness-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $fitnessBranch = FitnessBranch::factory()->create();

        $response = $this->get(route('fitness-branches.show', $fitnessBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
