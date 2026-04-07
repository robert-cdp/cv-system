<?php

namespace App\Http\Controllers\Cash;

use App\Models\Cash\CashRegister;
use App\Http\Controllers\Controller;

class CashRegisterController extends Controller
{
    public function index()
    {   
        $cashRegisters = CashRegister::ofUser()->latest()->get();
        return view('cash.index', compact('cashRegisters'));
    }
}
