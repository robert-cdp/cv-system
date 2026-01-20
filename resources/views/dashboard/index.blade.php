@extends('main')

@section('title', 'Dashboard')

@section('content')
    @include('dashboard.partials.cards')

    <div class="row">
        
        @include('dashboard.tramite.main')

        @include('dashboard.customer.main')
    </div>

@endsection
