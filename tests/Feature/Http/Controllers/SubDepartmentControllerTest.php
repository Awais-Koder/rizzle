<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SubDepartment;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SubDepartmentController
 */
final class SubDepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $subDepartments = SubDepartment::factory()->count(3)->create();

        $response = $this->get(route('sub-departments.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $subDepartment = SubDepartment::factory()->create();

        $response = $this->get(route('sub-departments.show', $subDepartment));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
