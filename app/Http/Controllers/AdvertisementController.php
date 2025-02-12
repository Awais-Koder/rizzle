<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementCollection;
use App\Models\Advertisement;
use Illuminate\Http\Request;

class AdvertisementController extends Controller
{
    public function index(Request $request): Response
    {
        $advertisements = Advertisement::all();

        return new AdvertisementCollection($advertisements);
    }
}
