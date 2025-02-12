<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Fitness;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\FitnessController
 */
final class FitnessControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $fitnesses = Fitness::factory()->count(3)->create();

        $response = $this->get(route('fitnesses.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $fitness = Fitness::factory()->create();

        $response = $this->get(route('fitnesses.show', $fitness));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
