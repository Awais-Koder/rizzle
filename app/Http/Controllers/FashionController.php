<?php

namespace App\Http\Controllers;

use App\Http\Resources\FashionCollection;
use App\Http\Resources\FashionResource;
use App\Models\Fashion;
use Illuminate\Http\Request;

class FashionController extends Controller
{
    public function index($type = null)
    {
        $query = Fashion::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'cloth' ? 'cloth' : 'shoes';
            $query->where('type', $type);
        }
        $fashions = $query->get();

        return new FashionCollection($fashions);
    }

    public function show(Request $request, Fashion $fashion)
    {
        $fashion->load('fashionBranches');
        return new FashionResource($fashion);
    }
}
