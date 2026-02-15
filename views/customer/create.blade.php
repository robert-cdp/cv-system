@extends('main')

@section('title', 'Registre un nuevo Cliente')

@section('page-description', 'Complete el formulario para crear un nuevo Cliente.')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('customer.store') }}">
                @csrf

                <div class="row g-3">
                    {{-- DPI --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="dpi" label="DPI" icon="fas fa-id-card" placeholder="Ingrese el DPI"
                            required />
                    </div>

                    {{-- NIT --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="nit" label="NIT" icon="fas fa-file-invoice" placeholder="Ingrese el NIT" />
                    </div>

                    {{-- Nombre completo --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="full_name" label="Nombre completo" icon="fas fa-user"
                            placeholder="Nombre completo del cliente" required />
                    </div>

                    {{-- Fecha de nacimiento --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="birthday" label="Fecha de nacimiento" type="date" icon="fas fa-calendar-alt"
                            required />
                    </div>

                    {{-- Botones --}}
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Guardar cliente
                        </button>
                        <a href="{{ route('customer.index') }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>

        </div>
    </div>
@endsection
