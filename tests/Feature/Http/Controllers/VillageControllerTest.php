<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Village;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\VillageController
 */
final class VillageControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $villages = Village::factory()->count(3)->create();

        $response = $this->get(route('villages.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $village = Village::factory()->create();

        $response = $this->get(route('villages.show', $village));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
