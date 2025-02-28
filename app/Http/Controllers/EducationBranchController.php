<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationBranchCollection;
use App\Http\Resources\EducationBranchResource;
use App\Models\EducationBranch;
use Illuminate\Http\Request;

class EducationBranchController extends Controller
{
    public function index($type = null , $eduType = null)
    {
        $query = EducationBranch::query();
        if($type){
            $query->where('type' , $type);
        }
        if($eduType){
            $query->where('edu_type' , $eduType);
        }
        $educationBranches = $query->get();

        return new EducationBranchCollection($educationBranches);
    }

    public function show(Request $request, EducationBranch $educationBranch)
    {
        return new EducationBranchResource($educationBranch);
    }
}
