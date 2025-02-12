<?php

namespace App\Http\Controllers;

use App\Http\Resources\DiscountCollection;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function index(Request $request)
    {
        $discounts = Discount::all();

        return new DiscountCollection($discounts);
    }
}
