<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Advertisement;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\AdvertisementController
 */
final class AdvertisementControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $advertisements = Advertisement::factory()->count(3)->create();

        $response = $this->get(route('advertisements.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
