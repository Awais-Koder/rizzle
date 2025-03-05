<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelBranchCollection;
use App\Http\Resources\TravelBranchResource;
use App\Models\TravelBranch;
use Illuminate\Http\Request;

class TravelBranchController extends Controller
{
    public function index($type = null)
    {
        $query = TravelBranch::query();
        if($type){
            $query->where('travel_type' , $type);
        }
        $travelBranches = $query->get();

        return new TravelBranchCollection($travelBranches);
    }

    public function show(Request $request, TravelBranch $travelBranch)
    {
        return new TravelBranchResource($travelBranch);
    }
}
