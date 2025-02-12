<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EducationCategory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EducationCategoryController
 */
final class EducationCategoryControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $educationCategories = EducationCategory::factory()->count(3)->create();

        $response = $this->get(route('education-categories.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $educationCategory = EducationCategory::factory()->create();

        $response = $this->get(route('education-categories.show', $educationCategory));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
