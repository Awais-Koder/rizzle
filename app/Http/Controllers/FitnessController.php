<?php

namespace App\Http\Controllers;

use App\Http\Resources\FitnessCollection;
use App\Http\Resources\FitnessResource;
use App\Models\Fitness;
use Illuminate\Http\Request;

class FitnessController extends Controller
{
    public function index(Request $request)
    {
        $fitnesses = Fitness::all();

        return new FitnessCollection($fitnesses);
    }

    public function show(Request $request, Fitness $fitness)
    {
        $fitness->load('fitnessBranches');
        return new FitnessResource($fitness);
    }
}
