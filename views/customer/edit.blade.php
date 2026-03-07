@extends('main')

<x-ui.page-meta title="Actualizar Cliente" subtitle="CComplete el formulario para actualizar al Cliente."
    icon="pencil" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('customer.update', $customer->dpi) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    {{-- DPI --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="dpi" label="DPI" icon="person-badge" placeholder="Ingrese el DPI"
                            value="{{ $customer->dpi }}" required />
                    </div>

                    {{-- NIT --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="nit" label="NIT" icon="person-vcard-fill" placeholder="Ingrese el NIT" value="{{ $customer->nit ?? '' }}" />
                    </div>

                    {{-- Nombre completo --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="full_name" label="Nombre completo" icon="person-lines-fill"
                            placeholder="Nombre completo del cliente" value="{{ $customer->full_name }}" required />
                    </div>

                    {{-- Fecha de nacimiento --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="birthday" label="Fecha de nacimiento" type="date" icon="calendar"
                            value="{{ $customer->birthday?->format('Y-m-d') }}" required />
                    </div>

                    <x-form.actions submit="Guardar " cancel-route="{{ route('customer.index') }}" />

                </div>
            </form>
        </div>
    </div>
@endsection
