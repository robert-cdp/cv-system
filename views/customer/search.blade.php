@extends('main')

@section('title', 'Búsqueda Avanzada de Clientes')

@section('content')

    @include('customer.search.form')

    <div id="resultsContainer"></div>
   
    <script src="{{ asset('js/customer-search.js') }}"></script>

@endsection
