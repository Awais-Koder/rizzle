<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\ShopProduct;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShopProductController
 */
final class ShopProductControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $shopProducts = ShopProduct::factory()->count(3)->create();

        $response = $this->get(route('shop-products.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $shopProduct = ShopProduct::factory()->create();

        $response = $this->get(route('shop-products.show', $shopProduct));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
