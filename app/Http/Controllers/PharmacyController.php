<?php

namespace App\Http\Controllers;

use App\Http\Resources\PharmacyCollection;
use App\Http\Resources\PharmacyResource;
use App\Models\Pharmacy;
use Illuminate\Http\Request;

class PharmacyController extends Controller
{
    public function index(Request $request)
    {
        $pharmacies = Pharmacy::all();

        return new PharmacyCollection($pharmacies);
    }

    public function show(Request $request, Pharmacy $pharmacy)
    {
        $pharmacy->load('pharmacyBranches');
        return new PharmacyResource($pharmacy);
    }
}
