@extends('main')

<x-ui.page-meta 
    title="Detalle del Cliente"
    subtitle="Consulte la información completa y los datos personales registrados del cliente."
    icon="person-vcard" 
/>

@section('content')
    <div class="row">
        <div class="col-md-3">
            @include('customer.show.data.personal')
            @include('customer.show.data.contact')
        </div>
        <div class="col-md-9">
            <div class="row">
                @include('customer.show.widgets')
            </div>
            @include('customer.show.service')
        </div>
    </div>
    @include('customer.show.modal.delete')
    @include('customer.show.modal.tramite')
    @include('customer.show.modal.contact')
@endsection

@push('scripts')
    <script src="{{ asset('panel/js/tramite-modal.js') }}"></script>
    <script src="{{ asset('panel/js/ajax-form.js') }}"></script>
@endpush
