<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Fashion;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FashionController
 */
final class FashionControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $fashions = Fashion::factory()->count(3)->create();

        $response = $this->get(route('fashions.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $fashion = Fashion::factory()->create();

        $response = $this->get(route('fashions.show', $fashion));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
