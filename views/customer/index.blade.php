@extends('main')

@section('title', 'Administrar Clientes')
@section('page-description', 'Administre, edite y supervise la información de todos sus clientes desde un solo lugar.')

@section('content')
<div class="card card-outline card-primary shadow-sm">

    @include('customer.index.header')
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                @include('customer.index.table-head')
                @include('customer.index.table-body')
            </table>
        </div>
    </div>
    
</div>
@endsection
