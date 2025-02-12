<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GovOffice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GovOfficeController
 */
final class GovOfficeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $govOffices = GovOffice::factory()->count(3)->create();

        $response = $this->get(route('gov-offices.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $govOffice = GovOffice::factory()->create();

        $response = $this->get(route('gov-offices.show', $govOffice));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
