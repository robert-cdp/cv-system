<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Customer\Customer;
use App\Models\Tramite\Tramite;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $latestCustomers = Customer::orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        $latestPendingTramites = Tramite::where('status', 'pendiente')
            ->orderBy('updated_at', 'desc')
            ->take(5)
            ->get();

        $totalCustomers = Customer::count();
        $totalTramites = Tramite::where('status', 'completo')->count();
        $totalTramitesPending = Tramite::where('status', 'pendiente')->count();
        $totalUsers = User::count();
        return view('dashboard.index', compact('totalCustomers', 'totalTramites', 'totalTramitesPending', 'latestCustomers', 'latestPendingTramites', 'totalUsers'));
    }
}
