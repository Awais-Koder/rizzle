<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Discount;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DiscountController
 */
final class DiscountControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $discounts = Discount::factory()->count(3)->create();

        $response = $this->get(route('discounts.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
