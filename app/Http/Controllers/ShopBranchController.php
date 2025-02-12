<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopBranchCollection;
use App\Http\Resources\ShopBranchResource;
use App\Models\ShopBranch;
use Illuminate\Http\Request;

class ShopBranchController extends Controller
{
    public function index(Request $request)
    {
        $shopBranches = ShopBranch::all();

        return new ShopBranchCollection($shopBranches);
    }

    public function show(Request $request, ShopBranch $shopBranch)
    {
        return new ShopBranchResource($shopBranch);
    }
}
