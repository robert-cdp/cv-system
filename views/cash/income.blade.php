@extends('main')

<x-page-meta title="Ingreso de dinero" subtitle="Registrar entrada manual de efectivo" icon="cash-coin" />

@section('content')
    <div class="card card-outline card-success">
        <div class="card-body">
            <form method="POST" action="{{ route('cash.income') }}">
                @csrf

                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="amount" label="Monto" icon="cash" type="number" step="0.01"
                            placeholder="0.00" required />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="description" label="Descripción" icon="chat-left-text" type="text"
                            placeholder="Ej: Ingreso adicional, ajuste, etc." />
                    </div>

                    <x-form.actions submit="Registrar ingreso" cancel-route="{{ route('dashboard.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
