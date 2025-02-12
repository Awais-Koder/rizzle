<?php

namespace App\Http\Controllers;

use App\Http\Resources\DoctorCategoryCollection;
use App\Http\Resources\DoctorCategoryResource;
use App\Models\DoctorCategory;
use Illuminate\Http\Request;

class DoctorCategoryController extends Controller
{
    public function index(Request $request)
    {
        $doctorCategories = DoctorCategory::all();

        return new DoctorCategoryCollection($doctorCategories);
    }

    public function show(Request $request, DoctorCategory $doctorCategory)
    {
        $doctorCategory->load('doctors');
        return new DoctorCategoryResource($doctorCategory);
    }
}
