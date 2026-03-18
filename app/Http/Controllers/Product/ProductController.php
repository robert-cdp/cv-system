<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Category;
use App\Models\Product\Product;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::with('category')->get();
        return view('product.index', compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Product::create($request->validated());
        return redirect()->route('product.index')->with('success', 'Creado correctamente.');
    }

    public function show(string $slug)
    {
        $product = Product::slug($slug)->firstOrFail();
        $categories = Category::all();
        return view('product.show', compact('product', 'categories'));
    }

    public function edit(string $slug)
    {
        $product = Product::slug($slug)->firstOrFail();
        $categories = Category::all();
        return view('product.edit', compact('product', 'categories'));
    }
    
    public function update(UpdateRequest $request, string $slug)
    {
        $product = Product::slug($slug)->firstOrFail();
        $product->update($request->validated());
        return redirect()->route('product.index')->with('success', 'Actualizado correctamente.');
    }

    public function destroy(string $slug)
    {
        $product = Product::slug($slug)->firstOrFail();
        $product->delete();
        return redirect()->route('product.index')->with('success', 'Eliminado correctamente.');
    }
}
