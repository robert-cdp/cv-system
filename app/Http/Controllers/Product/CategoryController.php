<?php

namespace App\Http\Controllers\Product;

use App\Models\Product\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\Product\Category\StoreRequest;
use App\Http\Requests\Product\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('product.category.index', compact('categories'));
    }

    public function create()
    {
        return view('product.category.create');
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->validated());
        return redirect()->route('product.category.index')->with('success', 'Creado correctamente.');
    }

    public function show(Category $category)
    {
        return view('product.category.show', compact('category'));
    }

    public function edit(Category $category)
    {
        return view('product.category.edit', compact('category'));
    }

    public function update(UpdateRequest $request, Category $category)
    {
        $category->update($request->validated());
        return redirect()->route('product.category.index')->with('success', 'Actualizado correctamente.');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('product.category.index')->with('success', 'Eliminado correctamente.');
    }
}
