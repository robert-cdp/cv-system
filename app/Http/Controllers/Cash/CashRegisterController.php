<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Models\Cash\CashMovement;
use App\Models\Cash\CashRegister;
use Illuminate\Http\Request;

class CashRegisterController extends Controller
{
    public function index()
    {
        $cashRegisters = CashRegister::where('user_id', auth()->id())
            ->latest()
            ->get();

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
    public function incomeForm()
    {
        return view('cash.income');
    }

    public function income(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'nullable|string|max:255',
        ]);

        $cashRegister = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->firstOrFail();

        CashMovement::create([
            'cash_register_id' => $cashRegister->id,
            'type' => 'income',
            'amount' => $request->amount,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Ingreso registrado');
    }

    public function expenseForm()
    {
        return view('cash.expense');
    }

    public function expense(Request $request)
    {
        $request->validate([
            'amount' => 'required|numeric|min:0.01',
            'description' => 'required|string|max:255',
        ]);

        $cashRegister = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->firstOrFail();

        CashMovement::create([
            'cash_register_id' => $cashRegister->id,
            'type' => 'expense',
            'amount' => -$request->amount,
            'description' => $request->description,
        ]);

        return redirect()->back()->with('success', 'Egreso registrado');
    }

    public function openForm()
    {
        $exists = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->exists();

        if ($exists) {
            return redirect()
                ->route('cash.index')
                ->with('warning', 'Ya tienes una caja abierta');
        }

        return view('cash.open');
    }

    public function open(Request $request)
    {
        $request->validate([
            'opening_amount' => 'required|numeric|min:0'
        ]);

        $exists = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->exists();

        if ($exists) {
            return back()->with('error', 'Ya tienes una caja abierta');
        }

        CashRegister::create([
            'user_id' => auth()->id(),
            'opening_amount' => $request->opening_amount,
            'opened_at' => now(),
        ]);

        return redirect()->route('pos.index')
            ->with('success', 'Caja abierta correctamente');
    }

    public function closeForm()
    {
        return view('cash.close');
    }

    public function close()
    {
        $cashRegister = CashRegister::where('user_id', auth()->id())
            ->whereNull('closed_at')
            ->firstOrFail();

        $movementsTotal = $cashRegister->movements()->sum('amount');

        $cashRegister->update([
            'closing_amount' => $cashRegister->opening_amount + $movementsTotal,
            'closed_at' => now(),
        ]);

        return redirect()->route('dashboard.index')
            ->with('success', 'Caja cerrada');
    }
}
