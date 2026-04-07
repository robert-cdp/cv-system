<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Models\Cash\CashRegister;
use Illuminate\Support\Facades\Auth;

class ShowController extends Controller
{
     public function show(CashRegister $cashRegister)
    {
        abort_if($cashRegister->user_id !== Auth::id(), 403);

        $cashRegister->load([
            'sales.items.product',
        ]);

        $totalSales   = $cashRegister->totalSales();
        $totalIncome  = $cashRegister->totalIncome();
        $totalExpense = $cashRegister->totalExpense();

        $expected = $cashRegister->opening_amount
            + $totalSales
            + $totalIncome
            + $totalExpense;

        $difference = $cashRegister->closing_amount !== null
            ? $cashRegister->closing_amount - $expected
            : null;

        return view('cash.show', compact(
            'cashRegister',
            'totalSales',
            'totalIncome',
            'totalExpense',
            'expected',
            'difference'
        ));
    }
}
