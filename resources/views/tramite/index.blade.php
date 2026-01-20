@extends('main')

@section('title', 'Administrar Tramites')
@section('page-description', '.')

@section('content')
<div class="card card-outline card-primary shadow-sm">

    @include('tramite.index.header')
    
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                @include('tramite.index.table-head')
                @include('tramite.index.table-body')
            </table>
        </div>
    </div>
    
</div>
@endsection
