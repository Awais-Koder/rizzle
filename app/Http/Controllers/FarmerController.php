<?php

namespace App\Http\Controllers;

use App\Http\Resources\FarmerCollection;
use App\Http\Resources\FarmerResource;
use App\Models\Farmer;
use Illuminate\Http\Request;

class FarmerController extends Controller
{
    public function index(Request $request)
    {
        $farmers = Farmer::all();

        return new FarmerCollection($farmers);
    }

    public function show(Request $request, Farmer $farmer)
    {
        return new FarmerResource($farmer);
    }
}
