<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $prod = Product::with('category')->latest()->paginate(8);

        return view('home', compact('prod'));
    }
}
