<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelBranchCollection;
use App\Http\Resources\TravelBranchResource;
use App\Models\TravelBranch;
use Illuminate\Http\Request;

class TravelBranchController extends Controller
{
    public function index(Request $request)
    {
        $travelBranches = TravelBranch::all();

        return new TravelBranchCollection($travelBranches);
    }

    public function show(Request $request, TravelBranch $travelBranch)
    {
        return new TravelBranchResource($travelBranch);
    }
}
