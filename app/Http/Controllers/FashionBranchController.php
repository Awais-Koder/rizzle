<?php

namespace App\Http\Controllers;

use App\Http\Resources\FashionBranchCollection;
use App\Http\Resources\FashionBranchResource;
use App\Models\FashionBranch;
use Illuminate\Http\Request;

class FashionBranchController extends Controller
{
    public function index(Request $request)
    {
        $fashionBranches = FashionBranch::all();

        return new FashionBranchCollection($fashionBranches);
    }

    public function show(Request $request, FashionBranch $fashionBranch)
    {
        return new FashionBranchResource($fashionBranch);
    }
}
