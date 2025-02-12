<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Farmer;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FarmerController
 */
final class FarmerControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $farmers = Farmer::factory()->count(3)->create();

        $response = $this->get(route('farmers.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $farmer = Farmer::factory()->create();

        $response = $this->get(route('farmers.show', $farmer));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
