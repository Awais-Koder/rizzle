<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationCollection;
use App\Http\Resources\EducationResource;
use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function index($type = null , $eduType = null)
    {
        $query = Education::query();
        if($type){
            $query->where('type' , $type);
        }
        if($eduType){
            $query->where('edu_type' , $eduType);
        }
        $education = $query->get();

        return new EducationCollection($education);
    }

    public function show(Request $request, Education $education)
    {
        $education->load('educationBranches');
        return new EducationResource($education);
    }
}
