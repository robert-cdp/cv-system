@extends('main')

<x-ui.page-meta title="Panel de Control"
    subtitle="Supervise la actividad del sistema y las métricas principales en tiempo real." icon="graph-up" />

@section('content')
    <div class="card card-outline card-primary shadow-sm mb-4">
        <div class="card-body d-flex align-items-center flex-wrap">

            <div>
                <h4 class="fw-bold mb-1">
                    Bienvenido de nuevo, {{ auth()->user()->name }}
                </h4>

                <p class="text-muted mb-0">
                    Aquí tiene un resumen rápido del estado del sistema, incluyendo clientes,
                    trámites y actividad reciente.
                </p>
            </div>

            <div class="ms-auto text-end mt-3 mt-md-0">

                <div class="mb-1">
                    <span class="badge bg-primary">
                        Rol: {{ auth()->user()->role->name ?? 'Usuario' }}
                    </span>
                </div>

                <div class="text-muted small">
                    {{ now()->format('d M Y') }}
                </div>

                <div class="text-success small">
                    Sistema operativo
                </div>

            </div>

        </div>
    </div>

    @include('dashboard.partials.cards')

    <div class="row">
        @include('dashboard.tramite.main')
        @include('dashboard.customer.main')
    </div>
@endsection
