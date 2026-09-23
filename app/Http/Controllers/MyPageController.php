<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Sale;

class MyPageController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $products = Product::where('user_id', $user->id)->get();

        $sales = Sale::with('product')
            ->where('user_id', $user->id)
            ->get();

        return view('mypage.index', compact('user', 'products', 'sales'));
    }
}

