<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\StoreRequest;
use App\Http\Requests\Customer\UpdateRequest;
use App\Models\Customer\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->take(10)->get();
        return view('customer.index', compact('customers'));
    }

    public function create()
    {
        return view('customer.create');
    }

    public function store(StoreRequest $request)
    {
        $customer = Customer::create($request->validated());
        return redirect()->route('customer.show', $customer->dpi)->with('success', 'Creado correctamente.');
    }

    public function edit(string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();
        return view('customer.edit', compact('customer'));
    }

    public function update(UpdateRequest $request, string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();
        $customer->update($request->validated());
        return redirect()->route('customer.show', $customer->dpi)->with('success', 'Actualizado Correctamente.');
    }
    
    public function destroy(string $code)
    {
        $customer = Customer::where('code', $code)->firstOrFail();
        $customer->delete();
        return redirect()->back()->with('success', 'Eliminado Correctamente.');
    }
}
