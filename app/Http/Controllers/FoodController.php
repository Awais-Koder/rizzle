<?php

namespace App\Http\Controllers;

use App\Http\Resources\FoodCollection;
use App\Http\Resources\FoodResource;
use App\Models\Food;
use Illuminate\Http\Request;

class FoodController extends Controller
{
    public function index($type = null)
    {
        $query = Food::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'regular' ? 'regular' : 'deal';
            $query->where('type', $type);
        }
        $food = $query->get();
        return new FoodCollection($food);
    }

    public function show(Request $request, Food $food)
    {
        $food->load('foodBranches');
        return new FoodResource($food);
    }
}
