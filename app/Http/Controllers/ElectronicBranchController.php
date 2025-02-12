<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElectronicBranchCollection;
use App\Http\Resources\ElectronicBranchResource;
use App\Models\ElectronicBranch;
use Illuminate\Http\Request;

class ElectronicBranchController extends Controller
{
    public function index(Request $request)
    {
        $electronicBranches = ElectronicBranch::all();

        return new ElectronicBranchCollection($electronicBranches);
    }

    public function show(Request $request, ElectronicBranch $electronicBranch)
    {
        return new ElectronicBranchResource($electronicBranch);
    }
}
