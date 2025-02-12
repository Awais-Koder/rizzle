<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaboratoryBranchCollection;
use App\Http\Resources\LaboratoryBranchResource;
use App\Models\LaboratoryBranch;
use Illuminate\Http\Request;

class LaboratoryBranchController extends Controller
{
    public function index(Request $request)
    {
        $laboratoryBranches = LaboratoryBranch::all();

        return new LaboratoryBranchCollection($laboratoryBranches);
    }

    public function show(Request $request, LaboratoryBranch $laboratoryBranch)
    {
        return new LaboratoryBranchResource($laboratoryBranch);
    }
}
