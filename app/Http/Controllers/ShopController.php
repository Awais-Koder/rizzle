<?php

namespace App\Http\Controllers;

use App\Http\Resources\ShopCollection;
use App\Http\Resources\ShopResource;
use App\Models\Shop;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $shops = Shop::all();

        return new ShopCollection($shops);
    }

    public function show(Request $request, Shop $shop)
    {
        $shop->load('shopBranches');
        return new ShopResource($shop);
    }
}
