<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElectronicCollection;
use App\Http\Resources\ElectronicResource;
use App\Models\Electronic;
use Illuminate\Http\Request;

class ElectronicController extends Controller
{
    public function index(Request $request)
    {
        $electronics = Electronic::all();

        return new ElectronicCollection($electronics);
    }

    public function show(Request $request, Electronic $electronic)
    {
        $electronic->load('electronicBranches');
        return new ElectronicResource($electronic);
    }
}
