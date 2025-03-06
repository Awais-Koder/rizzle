<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\SocialLink;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\SocialLinkController
 */
final class SocialLinkControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $socialLinks = SocialLink::factory()->count(3)->create();

        $response = $this->get(route('social-links.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
