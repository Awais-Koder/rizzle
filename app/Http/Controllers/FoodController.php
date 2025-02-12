<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodCollection;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index(Request $request)
    {
        $food = Food::all();

        return new FoodCollection($food);
    }

    public function show(Request $request, Food $food)
    {
        $food->load('foodBranches');
        return new FoodResource($food);
    }
}
