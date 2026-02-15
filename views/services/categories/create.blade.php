@extends('main')

@section('title', 'Agregar Categoría')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-body">
        <form method="POST" action="{{ route('services.categories.store') }}">
            @csrf
            <div class="row g-3">

                {{-- Nombre --}}
                <div class="col-12 col-md-6">
                    <x-form.input
                        name="name"
                        label="Nombre"
                        icon="fas fa-tag"
                        placeholder="Ej: Mantenimiento Industrial"
                        
                    />
                </div>

                {{-- Ícono --}}
                <div class="col-12 col-md-6">
                    <x-form.input
                        name="icon"
                        label="Ícono"
                        icon="fas fa-icons"
                        placeholder="Ej: fas fa-wrench"
                    />

                    <small class="text-muted">
                        Clase de FontAwesome
                    </small>
                </div>

                {{-- Descripción --}}
                <div class="col-12">
                    <x-form.textarea
                        name="description"
                        label="Descripción"
                        icon="fas fa-align-left"
                        placeholder="Descripción de la categoría"
                        rows="3"
                    />
                </div>

                {{-- Botones --}}
                <div class="col-12 text-end mt-3">
                    <a href="{{ route('services.categories.index') }}" class="btn btn-secondary">
                        <i class="fas fa-times me-1"></i> Cancelar
                    </a>

                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Guardar
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
@endsection
