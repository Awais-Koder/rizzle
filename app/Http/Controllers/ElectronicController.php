<?php

namespace App\Http\Controllers;

use App\Http\Resources\ElectronicCollection;
use App\Http\Resources\ElectronicResource;
use App\Models\Electronic;
use Illuminate\Http\Request;

class ElectronicController extends Controller
{
    public function index($type = null)
    {
        $query = Electronic::query();
        if ($type) {
            // Normalize input to match database values (if necessary)
            $type = strtolower($type) === 'regular' ? 'regular' : 'deal';
            $query->where('type', $type);
        }
        $electronics = $query->get();

        return new ElectronicCollection($electronics);
    }

    public function show(Request $request, Electronic $electronic)
    {
        $electronic->load('electronicBranches');
        return new ElectronicResource($electronic);
    }
}
