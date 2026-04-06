<?php

namespace App\Http\Controllers\Cash;

use App\Models\Cash\CashMovement;
use App\Models\Cash\CashRegister;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cash\ExpenseRequest;

class ExpenseController extends Controller
{
    public function expenseForm()
    {
        return view('cash.expense');
    }

    public function expense(ExpenseRequest $request)
    {
        $cashRegister = CashRegister::currentOpen()->firstOrFail();

        CashMovement::create([
            'cash_register_id' => $cashRegister->id,
            'type' => 'expense',
            'amount' => -$request->amount,
            'description' => $request->description,
        ]);

        return redirect()->route('cash.index')->with('success', 'Egreso registrado');
    }
}
