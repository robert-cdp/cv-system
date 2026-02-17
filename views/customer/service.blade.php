@extends('main')

@section('title', 'Agregar Nuevo Servicio')

@section('content')
    <div class="card card-outline card-primary mb-4">
        <div class="card-header">
            <h3 class="card-title">
                <i class="fas fa-cogs"></i> Registro de Servicio
            </h3>
        </div>
        <div class="card-body">
            <form method="POST" action="">
                <input type="hidden" id="customerDpi" value="{{ $customer->dpi }}">
                <div class="col-12 col-md-12">
                    <x-form.select name="service_type" id="service_type" label="Categoría" icon="fas fa-folder"
                        :options="$categories" option-value="slug" option-label="name" placeholder="Seleccione una categoría"
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
