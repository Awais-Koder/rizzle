<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\FashionBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FashionBranchController
 */
final class FashionBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $fashionBranches = FashionBranch::factory()->count(3)->create();

        $response = $this->get(route('fashion-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $fashionBranch = FashionBranch::factory()->create();

        $response = $this->get(route('fashion-branches.show', $fashionBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
