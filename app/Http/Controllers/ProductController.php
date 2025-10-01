<?php

namespace App\Http\Controllers;

use App\Models\category;
use App\Models\product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prod = product::all();
        $categories = category::all();
        return view('admin.product', compact('prod', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $req)
    {
        $prod = product::all();
        return view('admin.creatProd', compact('prod'));
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'nameProd' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'category_id' => 'required|exists:categories,id',
            'Desc' => 'nullable|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0'
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('products', 'public');
        }

        $p = product::create([
            'nameProd' => $validator['nameProd'],
            'image' => $imagePath,
            'category_id' => $validator['category_id'],
            'Desc' => $validator['Desc'],
            'price' => $validator['price'],
            'stock' => $validator['stock']
        ]);

        return redirect()->route('product.index')->with('success', 'Product created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(product $product)
    {
        //
    }
}
