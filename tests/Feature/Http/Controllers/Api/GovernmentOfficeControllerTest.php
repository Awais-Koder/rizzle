<?php

namespace Tests\Feature\Http\Controllers\Api;

use App\Models\GovernmentOffice;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\Api\GovernmentOfficeController
 */
final class GovernmentOfficeControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function branches_behaves_as_expected(): void
    {
        $governmentOffices = GovernmentOffice::factory()->count(3)->create();

        $response = $this->get(route('government-offices.branches'));
    }
}
