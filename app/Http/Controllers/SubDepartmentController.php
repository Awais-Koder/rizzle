<?php

namespace App\Http\Controllers;

use App\Http\Resources\SubDepartmentCollection;
use App\Http\Resources\SubDepartmentResource;
use App\Models\SubDepartment;
use Illuminate\Http\Request;

class SubDepartmentController extends Controller
{
    public function index(Request $request)
    {
        $subDepartments = SubDepartment::all();

        return new SubDepartmentCollection($subDepartments);
    }

    public function show(Request $request, SubDepartment $subDepartment)
    {
        return new SubDepartmentResource($subDepartment);
    }
}
