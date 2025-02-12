<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Department;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DepartmentController
 */
final class DepartmentControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $departments = Department::factory()->count(3)->create();

        $response = $this->get(route('departments.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $department = Department::factory()->create();

        $response = $this->get(route('departments.show', $department));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
