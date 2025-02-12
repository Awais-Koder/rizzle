<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ElectronicBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ElectronicBranchController
 */
final class ElectronicBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $electronicBranches = ElectronicBranch::factory()->count(3)->create();

        $response = $this->get(route('electronic-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $electronicBranch = ElectronicBranch::factory()->create();

        $response = $this->get(route('electronic-branches.show', $electronicBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
