<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalBranchCollection;
use App\Http\Resources\HospitalBranchResource;
use App\Models\HospitalBranch;
use Illuminate\Http\Request;

class HospitalBranchController extends Controller
{
    public function index($type = null): HospitalBranchCollection
    {
        $query = HospitalBranch::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'clinic' ? 'Clinic' : 'Hospital';
            $query->where('type', $type);
        }
        $hospitalBranches = $query->get();

        return new HospitalBranchCollection($hospitalBranches);
    }

    public function show(Request $request, HospitalBranch $hospitalBranch): HospitalBranchResource
    {
        return new HospitalBranchResource($hospitalBranch);
    }
}
