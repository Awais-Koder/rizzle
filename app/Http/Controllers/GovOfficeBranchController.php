<?php

namespace App\Http\Controllers;

use App\Http\Resources\GovOfficeBranchCollection;
use App\Http\Resources\GovOfficeBranchResource;
use App\Models\GovOfficeBranch;
use Illuminate\Http\Request;

class GovOfficeBranchController extends Controller
{
    public function index(Request $request)
    {
        $govOfficeBranches = GovOfficeBranch::all();

        return new GovOfficeBranchCollection($govOfficeBranches);
    }

    public function show(Request $request, GovOfficeBranch $govOfficeBranch)
    {
        return new GovOfficeBranchResource($govOfficeBranch);
    }
}
