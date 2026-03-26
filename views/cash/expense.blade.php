@extends('main')

<x-page-meta title="Retiro de dinero" subtitle="Registrar salida de efectivo de la caja" icon="cash-stack" />

@section('content')
    <div class="card card-outline card-danger">
        <div class="card-body">
            <form method="POST" action="{{ route('cash.expense') }}">
                @csrf

                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="amount" label="Monto" icon="cash" type="number" step="0.01"
                            placeholder="Q 0.00" required />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="description" label="Motivo" icon="exclamation-circle" type="text"
                            placeholder="Ej: Pago de servicios, retiro personal, etc." required />
                    </div>

                    <x-form.actions submit="Registrar retiro" cancel-route="{{ route('dashboard.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
