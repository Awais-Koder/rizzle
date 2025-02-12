<?php

namespace App\Http\Controllers;

use App\Http\Resources\DepartmentCollection;
use App\Http\Resources\DepartmentResource;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public function index(Request $request)
    {
        $departments = Department::all();

        return new DepartmentCollection($departments);
    }

    public function show(Request $request, Department $department)
    {
        $department->load('subDepartments');
        return new DepartmentResource($department);
    }
}
