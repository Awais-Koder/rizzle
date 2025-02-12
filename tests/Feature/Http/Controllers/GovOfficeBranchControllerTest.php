<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\GovOfficeBranch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GovOfficeBranchController
 */
final class GovOfficeBranchControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $govOfficeBranches = GovOfficeBranch::factory()->count(3)->create();

        $response = $this->get(route('gov-office-branches.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }


    #[Test]
    public function show_behaves_as_expected(): void
    {
        $govOfficeBranch = GovOfficeBranch::factory()->create();

        $response = $this->get(route('gov-office-branches.show', $govOfficeBranch));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
