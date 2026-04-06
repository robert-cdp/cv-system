<?php

namespace App\Http\Controllers\Cash;

use App\Http\Controllers\Controller;
use App\Http\Requests\Cash\OpenRequest;
use App\Mail\CashRegisterNotification;
use App\Models\Cash\CashRegister;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class OpenController extends Controller
{
    public function openForm()
    {
        if (CashRegister::currentOpen()->exists()) {
            return back()->with('error', 'Ya tienes una caja abierta');
        }

        return view('cash.open');
    }

    public function open(OpenRequest $request)
    {
        if (CashRegister::currentOpen()->exists()) {
            return back()->with('error', 'Ya tienes una caja abierta');
        }

        $cashRegister = CashRegister::create([
            'user_id' => Auth::id(),
            'opening_amount' => $request->opening_amount,
            'opened_at' => now(),
        ]);

        Mail::to('admin@empresa.com')->send(
            new CashRegisterNotification($cashRegister, 'open')
        );

        return redirect()->route('cash.index')->with('success', 'Caja abierta correctamente');
    }
}
