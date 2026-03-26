<?php

namespace App\Http\Middleware;

use App\Models\Cash\CashRegister;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class EnsureCashIsOpen
{
    public function handle($request, Closure $next)
    {
        $cash = CashRegister::where('user_id', Auth::user()->id)
            ->whereNull('closed_at')
            ->first();

        if (!$cash) {
            return redirect()->route('cash.open.form')
                ->with('error', 'Debes abrir caja primero');
        }

        return $next($request);
    }
}
