<?php

namespace App\Http\Controllers;

use App\Http\Resources\CityCollection;
use App\Http\Resources\CityResource;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function index(Request $request)
    {
        $cities = City::all();

        return new CityCollection($cities);
    }

    public function show(Request $request, City $city)
    {
        $city->load('villages');
        return new CityResource($city);
    }
}
