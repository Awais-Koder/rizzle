<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElectronicBranchCollection;
use App\Http\Resources\ElectronicBranchResource;
use App\Models\ElectronicBranch;
use Illuminate\Http\Request;

class ElectronicBranchController extends Controller
{
    public function index($type = null)
    {
        $query = Electronic::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'regular' ? 'regular' : 'deal';
            $query->where('type', $type);
        }
        $electronicBranches = $query->get();

        return new ElectronicBranchCollection($electronicBranches);
    }

    public function show(Request $request, ElectronicBranch $electronicBranch)
    {
        return new ElectronicBranchResource($electronicBranch);
    }
}
