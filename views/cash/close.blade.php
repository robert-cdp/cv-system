@extends('main')

<x-page-meta title="Cerrar Caja" subtitle="Cerrar el flujo de caja del día" icon="cash-stack" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('cash.close') }}">
                @csrf

                <div class="row g-3">

                    <div class="col-12 col-md-6">
                        <x-form.input name="closed_amount" label="Monto Final" icon="cash" type="number"
                            step="0.01" placeholder="0.00" required />
                    </div>

                    <x-form.actions submit="Cerrar Caja" cancel-route="{{ route('dashboard.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
