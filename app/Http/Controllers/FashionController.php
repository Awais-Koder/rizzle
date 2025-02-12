<?php

namespace App\Http\Controllers;

use App\Http\Resources\FashionCollection;
use App\Http\Resources\FashionResource;
use App\Models\Fashion;
use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function index(Request $request)
    {
        $fashions = Fashion::all();

        return new FashionCollection($fashions);
    }

    public function show(Request $request, Fashion $fashion)
    {
        $fashion->load('fashionBranches');
        return new FashionResource($fashion);
    }
}
