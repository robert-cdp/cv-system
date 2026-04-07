<?php

namespace App\Http\Controllers\Cash;

use App\Models\Cash\CashRegister;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Http\Requests\Cash\CloseRequest;
use App\Mail\CashRegisterNotification;

class CloseController extends Controller
{
    public function closeForm()
    {
        return view('cash.close');
    }

    public function close(CloseRequest $request)
    {
        $cashRegister = CashRegister::currentOpen()->firstOrFail();
        
        $movementsTotal = $cashRegister->movements()->sum('amount');

        $cashRegister->update([
            'status' => 'closed',
            'closing_amount' => $request->closing_amount ?? $cashRegister->opening_amount + $movementsTotal,
            'closing_note' => $request->closing_note,
            'closed_at' => now(),
        ]);

        Mail::to('roberto@conexionvirtual.net')->send(
            new CashRegisterNotification($cashRegister, 'close')
        );

        return redirect()->route('cash.index')->with('success', 'Caja cerrada correctamente');
    }
}
