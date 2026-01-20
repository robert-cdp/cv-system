<?php

namespace App\Http\Controllers\Service;

use App\Http\Controllers\Controller;
use App\Models\Service\Service;
use App\Models\Service\ServiceCategory;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;

class ServiceController extends Controller
{
    public function index()
    {
        $services = Service::with('category')->get();
        return view('services.index', compact('services'));
    }

    public function create()
    {
        $categories = ServiceCategory::all();
        return view('services.create', compact('categories'));
    }

    public function store(StoreRequest $request)
    {
        Service::create($request->validated());
        return redirect()->route('services.index')->with('success', 'Creado correctamente.');
    }

    public function show(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $categories = ServiceCategory::all();
        return view('services.show', compact('service', 'categories'));
    }

    public function edit(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $categories = ServiceCategory::all();
        return view('services.edit', compact('service', 'categories'));
    }
    
    public function update(UpdateRequest $request, string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $service->update($request->validated());
        return redirect()->route('services.index')->with('success', 'Actualizado correctamente.');
    }

    public function destroy(string $slug)
    {
        $service = Service::slug($slug)->firstOrFail();
        $service->delete();
        return redirect()->route('services.index')->with('success', 'Eliminado correctamente.');
    }
}
