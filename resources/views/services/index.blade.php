@extends('main')

@section('title', 'Servicios')

@section('content')
<div class="card card-outline card-primary shadow-sm">
    
    @include('services.index.header')

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                @include('services.index.table-head')
                @include('services.index.table-body')
            </table>
        </div>
    </div>

</div>

@include('services.index.record-delete')
@endsection
