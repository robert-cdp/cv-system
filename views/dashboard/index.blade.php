@extends('main')

<x-ui.page-meta title="Panel de Control"
    subtitle="Supervise la actividad del sistema y las métricas principales en tiempo real." icon="graph-up" />

@section('content')
    @include('dashboard.partials.cards')

    <div class="row">

        @include('dashboard.tramite.main')

        @include('dashboard.customer.main')
    </div>
@endsection
