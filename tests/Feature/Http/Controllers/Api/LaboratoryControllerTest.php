<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Laboratory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\LaboratoryController
 */
final class LaboratoryControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $laboratories = Laboratory::factory()->count(3)->create();

        $response = $this->get(route('laboratories.branches'));
    }
}
