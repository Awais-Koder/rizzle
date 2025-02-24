<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\HospitalController
 */
final class HospitalControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $hospitals = Hospital::factory()->count(3)->create();

        $response = $this->get(route('hospitals.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $hospital = Hospital::factory()->create();

        $response = $this->get(route('hospitals.show', $hospital));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
