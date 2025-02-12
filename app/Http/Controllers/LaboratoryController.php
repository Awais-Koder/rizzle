<?php

namespace App\Http\Controllers;

use App\Http\Resources\LaboratoryCollection;
use App\Http\Resources\LaboratoryResource;
use App\Models\Laboratory;
use Illuminate\Http\Request;

class LaboratoryController extends Controller
{
    public function index(Request $request)
    {
        $laboratories = Laboratory::all();

        return new LaboratoryCollection($laboratories);
    }

    public function show(Request $request, Laboratory $laboratory)
    {
        $laboratory->load('laboratoryBranches');
        return new LaboratoryResource($laboratory);
    }
}
