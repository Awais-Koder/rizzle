<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyBranchCollection;
use App\Http\Resources\PharmacyBranchResource;
use App\Models\PharmacyBranch;
use Illuminate\Http\Request;

class PharmacyBranchController extends Controller
{
    public function index(Request $request)
    {
        $pharmacyBranches = PharmacyBranch::all();

        return new PharmacyBranchCollection($pharmacyBranches);
    }

    public function show(Request $request, PharmacyBranch $pharmacyBranch)
    {
        return new PharmacyBranchResource($pharmacyBranch);
    }
}
