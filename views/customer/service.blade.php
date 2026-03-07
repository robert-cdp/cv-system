@extends('main')

<x-ui.page-meta 
    title="Agregar Nuevo Servicio"
    subtitle="Registre un nuevo servicio para el cliente y gestione su trámite dentro del sistema."
    icon="plus-circle-fill" 
/>

@section('content')
    <div class="card card-outline card-primary mb-4">
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" id="customerDpi" value="{{ $customer->dpi }}">
                <div class="col-12 col-md-12">
                    <x-form.select name="service_type" id="service_type" label="Eliga el Tipo de Servicio a Agregar" icon="folder"
                        :options="$categories" option-value="slug" option-label="name" placeholder="Seleccione"
                        data-url="{{ route('customer.service.loadForm') }}" />
                </div>
            </form>
        </div>
    </div>
    <div id="serviceFormContainer"></div>
@endsection

@push('scripts')
    <script src="{{ asset('panel/js/customer-service-form.js') }}"></script>
    <script src="{{ asset('panel/js/ajax-form.js') }}"></script>
@endpush
