<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodBranchCollection;
use App\Http\Resources\FoodBranchResource;
use App\Models\FoodBranch;
use Illuminate\Http\Request;

class FoodBranchController extends Controller
{
    public function index($type = null)
    {
        $query = FoodBranch::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'regular' ? 'regular' : 'deal';
            $query->where('type', $type);
        }
        $foodBranches = $query->get();

        return new FoodBranchCollection($foodBranches);
    }

    public function show(Request $request, FoodBranch $foodBranch)
    {
        return new FoodBranchResource($foodBranch);
    }
}
