<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreRequest;
use App\Http\Requests\User\UpdateRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(StoreRequest $request)
    {
        User::create($request->validated());
        return redirect()->route('user.index')->with('success', 'Creado Correctamente.');
    }

    public function edit(string $slug)
    {
        $user = User::slug($slug)->firstOrFail();
        return view('user.edit', compact('user'));
    }

    public function update(UpdateRequest $request, string $slug)
    {
        $user = User::slug($slug)->firstOrFail();
        $user->update($request->validated());
        return redirect()->route('user.index')->with('success', 'Actualizado Correctamente.');
    }

    public function destroy(string $slug)
    {
        $user = User::slug($slug)->firstOrFail();
        $user->delete();
        return redirect()->route('user.index')->with('success', 'Eliminado Correctamente.');
    }
}
