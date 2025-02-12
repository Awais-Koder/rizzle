<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ShopController
 */
final class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $shops = Shop::factory()->count(3)->create();

        $response = $this->get(route('shops.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $shop = Shop::factory()->create();

        $response = $this->get(route('shops.show', $shop));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
