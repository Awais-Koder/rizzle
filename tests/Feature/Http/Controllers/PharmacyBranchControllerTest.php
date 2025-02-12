<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\PharmacyBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PharmacyBranchController
 */
final class PharmacyBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $pharmacyBranches = PharmacyBranch::factory()->count(3)->create();

        $response = $this->get(route('pharmacy-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $pharmacyBranch = PharmacyBranch::factory()->create();

        $response = $this->get(route('pharmacy-branches.show', $pharmacyBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
