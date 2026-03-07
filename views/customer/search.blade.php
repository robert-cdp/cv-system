@extends('main')

<x-ui.page-meta 
    title="Búsqueda Avanzada de Clientes"
    subtitle="Utilice los filtros disponibles para localizar clientes dentro del sistema de forma rápida y precisa."
    icon="search" 
/>

@section('content')

    @include('customer.search.form')

    <div id="resultsContainer"></div>
   
    <script src="{{ asset('panel/js/customer-search.js') }}"></script>

@endsection
