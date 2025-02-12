<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\LaboratoryBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LaboratoryBranchController
 */
final class LaboratoryBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $laboratoryBranches = LaboratoryBranch::factory()->count(3)->create();

        $response = $this->get(route('laboratory-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $laboratoryBranch = LaboratoryBranch::factory()->create();

        $response = $this->get(route('laboratory-branches.show', $laboratoryBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
