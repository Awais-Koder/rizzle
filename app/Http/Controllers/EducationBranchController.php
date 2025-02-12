<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationBranchCollection;
use App\Http\Resources\EducationBranchResource;
use App\Models\EducationBranch;
use Illuminate\Http\Request;

class EducationBranchController extends Controller
{
    public function index(Request $request)
    {
        $educationBranches = EducationBranch::all();

        return new EducationBranchCollection($educationBranches);
    }

    public function show(Request $request, EducationBranch $educationBranch)
    {
        return new EducationBranchResource($educationBranch);
    }
}
