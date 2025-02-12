<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodBranchCollection;
use App\Http\Resources\FoodBranchResource;
use App\Models\FoodBranch;
use Illuminate\Http\Request;

class FoodBranchController extends Controller
{
    public function index(Request $request)
    {
        $foodBranches = FoodBranch::all();

        return new FoodBranchCollection($foodBranches);
    }

    public function show(Request $request, FoodBranch $foodBranch)
    {
        return new FoodBranchResource($foodBranch);
    }
}
