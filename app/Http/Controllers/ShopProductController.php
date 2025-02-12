<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopProductCollection;
use App\Http\Resources\ShopProductResource;
use App\Models\ShopProduct;
use Illuminate\Http\Request;

class ShopProductController extends Controller
{
    public function index(Request $request)
    {
        $shopProducts = ShopProduct::all();

        return new ShopProductCollection($shopProducts);
    }

    public function show(Request $request, ShopProduct $shopProduct)
    {
        return new ShopProductResource($shopProduct);
    }
}
