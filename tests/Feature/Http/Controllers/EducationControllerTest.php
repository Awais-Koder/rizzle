<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Education;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EducationController
 */
final class EducationControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $education = Education::factory()->count(3)->create();

        $response = $this->get(route('education.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $education = Education::factory()->create();

        $response = $this->get(route('education.show', $education));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
