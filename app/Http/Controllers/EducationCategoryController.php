<?php

namespace App\Http\Controllers;

use App\Http\Resources\EducationCategoryCollection;
use App\Http\Resources\EducationCategoryResource;
use App\Models\EducationCategory;
use Illuminate\Http\Request;

class EducationCategoryController extends Controller
{
    public function index(Request $request)
    {
        $educationCategories = EducationCategory::all();

        return new EducationCategoryCollection($educationCategories);
    }

    public function show(Request $request, EducationCategory $educationCategory)
    {
        $educationCategory->load('education');
        return new EducationCategoryResource($educationCategory);
    }
}
