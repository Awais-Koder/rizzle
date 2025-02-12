<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\DoctorCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DoctorCategoryController
 */
final class DoctorCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $doctorCategories = DoctorCategory::factory()->count(3)->create();

        $response = $this->get(route('doctor-categories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $doctorCategory = DoctorCategory::factory()->create();

        $response = $this->get(route('doctor-categories.show', $doctorCategory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
