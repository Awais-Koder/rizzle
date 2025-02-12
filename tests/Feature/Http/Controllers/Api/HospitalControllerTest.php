<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Hospital;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\HospitalController
 */
final class HospitalControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $hospitals = Hospital::factory()->count(3)->create();

        $response = $this->get(route('hospitals.branches'));
    }
}
