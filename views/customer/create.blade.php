@extends('main')

<x-ui.page-meta title="Registre un nuevo Cliente" subtitle="Complete el formulario para crear un nuevo Cliente."
    icon="person-plus" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('customer.store') }}">
                @csrf

                <div class="row g-3">
                    {{-- DPI --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="dpi" label="DPI" icon="person-badge" placeholder="Ingrese el DPI"
                            required />
                    </div>

                    {{-- NIT --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="nit" label="NIT" icon="person-vcard-fill" placeholder="Ingrese el NIT" />
                    </div>

                    {{-- Nombre completo --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="full_name" label="Nombre completo" icon="person-lines-fill"
                            placeholder="Nombre completo del cliente" required />
                    </div>

                    {{-- Fecha de nacimiento --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="birthday" label="Fecha de nacimiento" type="date" icon="calendar"
                            required />
                    </div>

                    <x-form.actions submit="Guardar Usuario" cancel-route="{{ route('customer.index') }}" />

                </div>
            </form>

        </div>
    </div>
@endsection
