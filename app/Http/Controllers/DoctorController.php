<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorCollection;
use App\Http\Resources\DoctorResource;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::all();

        return new DoctorCollection($doctors);
    }

    public function show(Request $request, Doctor $doctor)
    {
        return new DoctorResource($doctor);
    }
}
