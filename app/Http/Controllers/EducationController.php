<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationCollection;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index(Request $request)
    {
        $education = Education::all();

        return new EducationCollection($education);
    }

    public function show(Request $request, Education $education)
    {
        $education->load('educationBranches');
        return new EducationResource($education);
    }
}
