<?php

namespace App\Http\Controllers\Tramite;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tramite\StoreRequest;
use App\Http\Requests\Tramite\UpdateRequest;
use App\Models\Customer\Customer;
use App\Models\Service\Service;
use App\Models\Tramite\Tramite;

class TramiteController extends Controller
{
    public function index()
    {
        $tramites = Tramite::all();
        return view('tramite.index', compact('tramites'));
    }

    public function store(StoreRequest $request, string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();

        $customerService = $customer->services()->create([
            'service_id'   => $request->service_id,
            'service_type' => 'tramite',
        ]);

        $customerService->tramite()->create(
            $request->validated()
        );

        return response()->json([
            'success' => true,
            'redirect' => route('customer.show', $customer->dpi),
        ]);
    }

    public function print(string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();
        return view('tramite.print', compact('customer'));
    }

    public function edit(int $id)
    {
        $tramite = Tramite::findOrFail($id);
        $customer = $tramite->customerService->customer;
        $services = Service::all();
        return view('tramite.edit', compact('tramite', 'customer', 'services'));
    }
    
    public function update(UpdateRequest $request, int $id)
    {
        $tramite = Tramite::findOrFail($id);
        $customer = $tramite->customerService->customer;
        $tramite->update($request->validated());
        return redirect()->route('customer.show', $customer->dpi)->with('success', 'Actualizado Correctamente.');
    }

    public function destroy(int $id)
    {
        $tramite = Tramite::findOrFail($id);
        $customer = $tramite->customerService->customer;
        $tramite->delete();
        return redirect()->route('customer.show', $customer->dpi)->with('success', 'Eliminado Correctamente.');
    }
}
