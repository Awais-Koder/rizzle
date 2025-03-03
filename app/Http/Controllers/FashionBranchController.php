<?php

namespace App\Http\Controllers;

use App\Http\Resources\FashionBranchCollection;
use App\Http\Resources\FashionBranchResource;
use App\Models\FashionBranch;
use Illuminate\Http\Request;

class FashionBranchController extends Controller
{
    public function index($type = null)
    {
        $query = FashionBranch::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'cloth' ? 'cloth' : 'shoes';
            $query->where('type', $type);
        }
        $fashionBranches = $query->get();
        return new FashionBranchCollection($fashionBranches);
    }

    public function show(Request $request, FashionBranch $fashionBranch)
    {
        return new FashionBranchResource($fashionBranch);
    }
}
