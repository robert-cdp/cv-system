<?php

namespace App\Http\Controllers\Cash;

use App\Models\Cash\CashMovement;
use App\Models\Cash\CashRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cash\IncomeRequest;

class IncomeController extends Controller
{
    public function incomeForm()
    {
        return view('cash.income');
    }

    public function income(IncomeRequest $request)
    {
        $cashRegister = CashRegister::currentOpen()->firstOrFail();

        CashMovement::create([
            'cash_register_id' => $cashRegister->id,
            'type' => 'income',
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('cash.index')->with('success', 'Ingreso registrado.');
    }
}
