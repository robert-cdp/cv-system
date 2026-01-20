<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\ServiceCategory;
use App\Http\Requests\Service\Category\StoreRequest;
use App\Http\Requests\Service\Category\UpdateRequest;

class ServiceCategoryController extends Controller
{
    public function index()
    {
        $categories = ServiceCategory::all();
        return view('services.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('services.categories.create');
    }

    public function store(StoreRequest $request)
    {
        ServiceCategory::create($request->validated());
        return redirect()->route('services.categories.index')->with('success', 'Creado Correctamente.');
    }

    public function show(string $slug)
    {
        $category = ServiceCategory::slug($slug)->firstOrFail();
        return view('services.categories.show', compact('category'));
    }

    public function edit(string $slug)
    {
        $category = ServiceCategory::slug($slug)->firstOrFail();
        return view('services.categories.edit', compact('category'));
    }

    public function update(UpdateRequest $request, string $slug)
    {
        $category = ServiceCategory::slug($slug)->firstOrFail();
        $category->update($request->validated());
        return redirect()->route('services.categories.index')->with('success', 'Actualizado Correctamente.');
    }

    public function destroy(string $slug)
    {
        $category = ServiceCategory::slug($slug)->firstOrFail();
        $category->delete();
        return redirect()->route('services.categories.index')->with('success', 'Eliminado Correctamente.');
    }
}
