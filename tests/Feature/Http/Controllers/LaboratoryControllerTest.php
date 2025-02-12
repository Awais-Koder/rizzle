<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Laboratory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\LaboratoryController
 */
final class LaboratoryControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $laboratories = Laboratory::factory()->count(3)->create();

        $response = $this->get(route('laboratories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $laboratory = Laboratory::factory()->create();

        $response = $this->get(route('laboratories.show', $laboratory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
