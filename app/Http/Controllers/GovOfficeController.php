<?php

namespace App\Http\Controllers;

use App\Http\Resources\GovOfficeCollection;
use App\Http\Resources\GovOfficeResource;
use App\Models\GovOffice;
use Illuminate\Http\Request;

class GovOfficeController extends Controller
{
    public function index(Request $request)
    {
        $govOffices = GovOffice::all();

        return new GovOfficeCollection($govOffices);
    }

    public function show(Request $request, GovOffice $govOffice)
    {
        $govOffice->load('govOfficeBranches');
        return new GovOfficeResource($govOffice);
    }
}
