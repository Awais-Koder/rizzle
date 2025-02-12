<?php

namespace App\Http\Controllers;

use App\Http\Resources\FitnessBranchCollection;
use App\Http\Resources\FitnessBranchResource;
use App\Models\FitnessBranch;
use Illuminate\Http\Request;

class FitnessBranchController extends Controller
{
    public function index(Request $request)
    {
        $fitnessBranches = FitnessBranch::all();

        return new FitnessBranchCollection($fitnessBranches);
    }

    public function show(Request $request, FitnessBranch $fitnessBranch)
    {
        return new FitnessBranchResource($fitnessBranch);
    }
}
