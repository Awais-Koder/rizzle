<?php

namespace App\Http\Controllers;

use App\Http\Resources\TravelCollection;
use App\Http\Resources\TravelResource;
use App\Models\Travel;
use Illuminate\Http\Request;

class TravelController extends Controller
{
    public function index(Request $request)
    {
        $travel = Travel::all();

        return new TravelCollection($travel);
    }

    public function show(Request $request, Travel $travel)
    {
        $travel->load('travelBranches');
        return new TravelResource($travel);
    }
}
