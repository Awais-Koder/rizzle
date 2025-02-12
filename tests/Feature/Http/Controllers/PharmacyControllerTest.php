<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Pharmacy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PharmacyController
 */
final class PharmacyControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $pharmacies = Pharmacy::factory()->count(3)->create();

        $response = $this->get(route('pharmacies.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $pharmacy = Pharmacy::factory()->create();

        $response = $this->get(route('pharmacies.show', $pharmacy));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
