<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ShopBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShopBranchController
 */
final class ShopBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $shopBranches = ShopBranch::factory()->count(3)->create();

        $response = $this->get(route('shop-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $shopBranch = ShopBranch::factory()->create();

        $response = $this->get(route('shop-branches.show', $shopBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
