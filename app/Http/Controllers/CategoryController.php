<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;


class CategoryController extends Controller
{
    public function index (){ 
        $category = category::all();
        return view('admin.category', compact('category'));
    }

    public function create()
    {
        $category = collect();
        return view('category', compact('category'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        category::create($request->only('name'));

        return redirect()->route('category.index')->with('success', 'Category created successfully.');
    }
}
