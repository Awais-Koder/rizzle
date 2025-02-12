<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\Pharmacy;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\PharmacyController
 */
final class PharmacyControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $pharmacies = Pharmacy::factory()->count(3)->create();

        $response = $this->get(route('pharmacies.branches'));
    }
}
