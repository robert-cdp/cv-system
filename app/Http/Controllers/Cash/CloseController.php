<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Mail\CashRegisterNotification;
use App\Models\Cash\CashRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CloseController extends Controller
{
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
            'status' => 'closed',
            'closing_amount' => $cashRegister->opening_amount + $movementsTotal,
            'closed_at' => now(),
        ]);

        Mail::to('admin@empresa.com')->send(
            new CashRegisterNotification($cashRegister, 'close')
        );

        return redirect()->route('dashboard.index')->with('success', 'Caja cerrada');
    }
}
