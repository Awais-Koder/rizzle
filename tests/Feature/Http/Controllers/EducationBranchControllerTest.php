<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\EducationBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\EducationBranchController
 */
final class EducationBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $educationBranches = EducationBranch::factory()->count(3)->create();

        $response = $this->get(route('education-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $educationBranch = EducationBranch::factory()->create();

        $response = $this->get(route('education-branches.show', $educationBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
