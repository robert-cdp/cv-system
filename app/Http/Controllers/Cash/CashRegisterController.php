<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Mail\CashRegisterNotification;
use App\Models\Cash\CashRegister;
use Illuminate\Support\Facades\Mail;

class CashRegisterController extends Controller
{
    public function index()
    {
        $cashRegisters = CashRegister::where('user_id', auth()->id())->latest()->get();
        return view('cash.index', compact('cashRegisters'));
    }

    public function show(CashRegister $cashRegister)
    {
        if ($cashRegister->user_id !== auth()->id()) {
            abort(403);
        }

        $cashRegister->load([
            'movements',
            'sales.items.product'
        ]);

        $totalSales = $cashRegister->sales->sum('total');

        $totalIngresos = $cashRegister->movements
            ->where('type', 'income')
            ->sum('amount');

        $totalEgresos = $cashRegister->movements
            ->where('type', 'expense')
            ->sum('amount');

        $expected = $cashRegister->opening_amount
            + $totalSales
            + $totalIngresos
            + $totalEgresos;

        $difference = $cashRegister->closing_amount !== null
            ? $cashRegister->closing_amount - $expected
            : null;

        return view('cash.show', compact(
            'cashRegister',
            'totalSales',
            'totalIngresos',
            'totalEgresos',
            'expected',
            'difference'
        ));
    }


    
}
