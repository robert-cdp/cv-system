@extends('main')

@section('title', 'Administrar Usuarios del Sistema')
@section('page-description', 'Administre, edite y supervise la información de todos sus clientes desde un solo lugar.')

@section('content')
<div class="card card-outline card-primary shadow-sm">

    @include('user.index.header')
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                @include('user.index.table-head')
                @include('user.index.table-body')
            </table>
        </div>
    </div>
    
</div>

@include('user.index.modal-delete')
@endsection
