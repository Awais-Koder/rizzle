<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodCategoryCollection;
use App\Http\Resources\FoodCategoryResource;
use App\Models\FoodCategory;
use Illuminate\Http\Request;

class FoodCategoryController extends Controller
{
    public function index(Request $request)
    {
        $foodCategories = FoodCategory::all();

        return new FoodCategoryCollection($foodCategories);
    }

    public function show(Request $request, FoodCategory $foodCategory)
    {
        $foodCategory->load('food');
        return new FoodCategoryResource($foodCategory);
    }
}
