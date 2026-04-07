<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Models\Cash\CashRegister;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Cash\OpenRequest;
use App\Mail\CashRegisterNotification;

class OpenController extends Controller
{
    public function openForm()
    {
        if (CashRegister::currentOpen()->exists()) {
            return redirect()->route('cash.index')->with('error', 'Ya tienes una caja abierta');
        }

        return view('cash.open');
    }

    public function open(OpenRequest $request)
    {
        if (CashRegister::currentOpen()->exists()) {
            return redirect()->route('cash.index')->with('error', 'Ya tienes una caja abierta');
        }

        $cashRegister = CashRegister::create([
            'user_id' => Auth::id(),
            'opening_amount' => $request->opening_amount,
            'opened_at' => now(),
        ]);

        Mail::to('roberto@conexionvirtual.net')->send(
            new CashRegisterNotification($cashRegister, 'open')
        );

        return redirect()->route('cash.index')->with('success', 'Caja abierta correctamente');
    }
}
