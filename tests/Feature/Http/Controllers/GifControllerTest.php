<?php

namespace Tests\Feature\Http\Controllers;

use App\Models\Gif;
use Illuminate\Foundation\Testing\RefreshDatabase;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * @see \App\Http\Controllers\GifController
 */
final class GifControllerTest extends TestCase
{
    use RefreshDatabase;

    #[Test]
    public function index_behaves_as_expected(): void
    {
        $gifs = Gif::factory()->count(3)->create();

        $response = $this->get(route('gifs.index'));

        $response->assertOk();
        $response->assertJsonStructure([]);
    }
}
