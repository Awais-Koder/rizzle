<?php

namespace App\Http\Controllers;

use App\Http\Resources\VillageCollection;
use App\Http\Resources\VillageResource;
use App\Models\Village;
use Illuminate\Http\Request;

class VillageController extends Controller
{
    public function index(Request $request)
    {
        $villages = Village::all();

        return new VillageCollection($villages);
    }

    public function show(Request $request, Village $village)
    {
        return new VillageResource($village);
    }
}
