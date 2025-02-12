<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Travel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\TravelController
 */
final class TravelControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $travel = Travel::factory()->count(3)->create();

        $response = $this->get(route('travel.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $travel = Travel::factory()->create();

        $response = $this->get(route('travel.show', $travel));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
