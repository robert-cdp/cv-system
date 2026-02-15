@extends('main')

@section('title', 'Categorías de Servicios')

@section('content')
<div class="card card-outline card-primary shadow-sm">
    
    @include('services.categories.index.header')

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                @include('services.categories.index.table-head')
                @include('services.categories.index.table-body')
            </table>
        </div>
    </div>

</div>

@include('services.categories.index.record-delete')
@endsection
