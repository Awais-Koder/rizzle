<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\HospitalBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HospitalBranchController
 */
final class HospitalBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $hospitalBranches = HospitalBranch::factory()->count(3)->create();

        $response = $this->get(route('hospital-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $hospitalBranch = HospitalBranch::factory()->create();

        $response = $this->get(route('hospital-branches.show', $hospitalBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
