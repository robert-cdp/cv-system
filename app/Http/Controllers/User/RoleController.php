<?php

namespace App\Http\Controllers\User;

use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\Role\StoreRequest;
use App\Http\Requests\User\Role\UpdateRequest;

class RoleController extends Controller
{
    public function index()
    {
        return view('role.index');
    }

    public function create()
    {
        return view('role.create');
    }

    public function store(StoreRequest $request)
    {
        Role::create($request->validated($request->validated()));
        return redirect()->route('role.index')->with('success', 'Creado Correctamente.');
    }

    public function edit(string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();
        return view('role.edit', compact('role'));
    }

    public function update(UpdateRequest $request, string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();
        $role->update($request->validated());
        return redirect()->route('role.index')->with('success', 'Actualizado Correctamente.');
    }

    public function destroy(string $slug)
    {
        $role = Role::slug($slug)->firstOrFail();
        $role->delete();
        return redirect()->route('role.index')->with('success', 'Actualizado Correctamente.');
    }
}
