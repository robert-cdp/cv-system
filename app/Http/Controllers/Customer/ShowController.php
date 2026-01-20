<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    public function show(string $dpi)
    {
        $customer = Customer::DPI($dpi)->firstOrFail();
        return view('customer.show', compact('customer'));
    }
}
