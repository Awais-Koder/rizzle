<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalBranchCollection;
use App\Http\Resources\HospitalBranchResource;
use App\Models\HospitalBranch;
use Illuminate\Http\Request;

class HospitalBranchController extends Controller
{
    public function index(Request $request): HospitalBranchCollection
    {
        $hospitalBranches = HospitalBranch::all();

        return new HospitalBranchCollection($hospitalBranches);
    }

    public function show(Request $request, HospitalBranch $hospitalBranch): HospitalBranchResource
    {
        return new HospitalBranchResource($hospitalBranch);
    }
}
