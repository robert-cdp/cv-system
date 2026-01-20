<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Service\Service;
use App\Models\Service\ServiceCategory;
use Illuminate\Http\Request;

class FormController extends Controller
{
    public function index(string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();
        $categories = ServiceCategory::all();
        return view('customer.service', compact('customer', 'categories'));
    }

    public function loadForm(Request $request)
    {
        $customer = Customer::DPI($request->dpi)->firstOrFail();
        $services = Service::all();

        if (!$request->ajax()) {
            abort(404);
        }

        switch ($request->service_type) {
            case 'tramites':
                return response()->json([
                    'success' => true,
                    'html' => view('tramite.create', compact('customer', 'services'))->render()
                ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Servicio no soportado'
        ], 422);
    }
}
