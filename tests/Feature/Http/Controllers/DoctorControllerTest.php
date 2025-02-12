<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\DoctorController
 */
final class DoctorControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $doctors = Doctor::factory()->count(3)->create();

        $response = $this->get(route('doctors.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $doctor = Doctor::factory()->create();

        $response = $this->get(route('doctors.show', $doctor));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
