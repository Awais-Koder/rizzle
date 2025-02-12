<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Shop;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\ShopController
 */
final class ShopControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $shops = Shop::factory()->count(3)->create();

        $response = $this->get(route('shops.branches'));
    }
}
