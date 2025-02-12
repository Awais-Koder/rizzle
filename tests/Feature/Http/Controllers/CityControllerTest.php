<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\City;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\CityController
 */
final class CityControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $cities = City::factory()->count(3)->create();

        $response = $this->get(route('cities.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $city = City::factory()->create();

        $response = $this->get(route('cities.show', $city));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
