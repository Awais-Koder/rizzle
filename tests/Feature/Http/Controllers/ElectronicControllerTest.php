<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Electronic;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\ElectronicController
 */
final class ElectronicControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $electronics = Electronic::factory()->count(3)->create();

        $response = $this->get(route('electronics.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $electronic = Electronic::factory()->create();

        $response = $this->get(route('electronics.show', $electronic));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
