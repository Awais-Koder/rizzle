<?php

namespace App\Http\Controllers;

use App\Http\Resources\GifCollection;
use App\Models\Gif;
use Illuminate\Http\Request;

class GifController extends Controller
{
    public function index(Request $request)
    {
        $gifs = Gif::all();

        return new GifCollection($gifs);
    }
}
