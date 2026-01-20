<?php

namespace App\Http\Controllers\Customer;

use App\Models\Customer\Customer;
use App\Http\Controllers\Controller;
use App\Http\Requests\Customer\SearchRequest;

class SearchController extends Controller
{
    public function index()
    {
        return view('customer.search');
    }

    public function search(SearchRequest $request)
    {
        $customers = $this->buildSearchQuery($request)->take(10)->get();

        $view = $customers->isEmpty()
            ? 'customer.search.not-found'
            : 'customer.search.result';

        return response()->json([
            'html' => view($view, compact('customers'))->render()
        ]);
    }

    private function buildSearchQuery(SearchRequest $request)
    {
        return Customer::query()
            ->when($request->filled('dpi'), fn ($q) =>
                $q->where('dpi', $request->dpi)
            )
            ->when($request->filled('nit'), fn ($q) =>
                $q->where('nit', $request->nit)
            )
            ->when($request->filled('full_name'), fn ($q) =>
                $q->where('full_name', 'like', "%{$request->full_name}%")
            )
            ->when($request->filled('birthday'), fn ($q) =>
                $q->whereDate('birthday', $request->birthday)
            );
    }
}
