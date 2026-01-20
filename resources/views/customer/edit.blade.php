@extends('main')

@section('title', 'Actualizar Cliente')

@section('page-description', 'Complete el formulario para actualizar al Cliente.')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('customer.update', $customer->dpi) }}">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    {{-- DPI --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="dpi" label="DPI" icon="fas fa-id-card" placeholder="Ingrese el DPI"
                            value="{{ $customer->dpi }}" required />
                    </div>

                    {{-- NIT --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="nit" label="NIT" icon="fas fa-file-invoice" placeholder="Ingrese el NIT"
                            value="{{ $customer->nit ?? '' }}" required />
                    </div>

                    {{-- Nombre completo --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="full_name" label="Nombre completo" icon="fas fa-user"
                            placeholder="Nombre completo del cliente" value="{{ $customer->full_name }}" required />
                    </div>

                    {{-- Fecha de nacimiento --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="birthday" label="Fecha de nacimiento" type="date" icon="fas fa-calendar-alt"
                            value="{{ $customer->birthday?->format('Y-m-d') }}" required />
                    </div>

                    {{-- Botones --}}
                    <div class="col-12 text-end mt-3">
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-1"></i> Actualizar cliente
                        </button>
                        <a href="{{ route('customer.show', $customer->dpi) }}" class="btn btn-secondary">
                            <i class="fas fa-times me-1"></i> Cancelar
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
