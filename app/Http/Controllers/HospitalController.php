<?php

namespace App\Http\Controllers;

use App\Http\Resources\HospitalCollection;
use App\Http\Resources\HospitalResource;
use App\Models\Hospital;
use Illuminate\Http\Request;

class HospitalController extends Controller
{
    public function index($type = null): HospitalCollection
    {
        $query = Hospital::query();

        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'clinic' ? 'Clinic' : 'Hospital';
            $query->where('type', $type);
        }

        $hospitals = $query->get();

        return new HospitalCollection($hospitals);
    }


    public function show(Request $request, Hospital $hospital): HospitalResource
    {
        $hospital->load('hospitalBranches');
        return new HospitalResource($hospital);
    }
}
