<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Hospital;
use App\Models\hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\hospitalController
 */
final class hospitalControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $hospitals = hospital::factory()->count(3)->create();

        $response = $this->get(route('hospitals.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $hospital = hospital::factory()->create();

        $response = $this->get(route('hospitals.show', $hospital));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
