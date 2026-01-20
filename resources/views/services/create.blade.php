@extends('main')

@section('title', 'Crear Categoría')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('services.store') }}">
                @csrf

                <div class="row g-3">

                    {{-- Categoría --}}
                    <div class="col-12 col-md-6">
                        <x-form.select name="category_id" label="Categoría" icon="fas fa-folder" :options="$categories"
                            option-value="id" option-label="name" placeholder="Seleccione una categoría" />
                    </div>

                    {{-- Nombre --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre" icon="fas fa-tag" placeholder="Ej: Antecedentes" />
                    </div>

                    {{-- Subtítulo --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="subtitle" label="Subtítulo" icon="fas fa-heading"
                            placeholder="Servicio especializado" />
                    </div>

                    {{-- Ícono --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="icon" label="Ícono" icon="fas fa-icons" placeholder="Ej: fas fa-wrench" />
                        <small class="text-muted">Clase de FontAwesome</small>
                    </div>

                    {{-- Precio --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="price" label="Precio" icon="fas fa-dollar-sign" type="number" step="0.01"
                            placeholder="0.00" />
                    </div>

                    {{-- Descripción --}}
                    <div class="col-12">
                        <x-form.textarea name="description" label="Descripción" icon="fas fa-align-left"
                            placeholder="Descripción del servicio" rows="3" />
                    </div>

                    {{-- Estado --}}
                    <div class="col-12 col-md-4">
                        <x-form.select name="is_active" label="Estado" icon="fas fa-toggle-on" :options="[
                            1 => 'Activo',
                            0 => 'Inactivo',
                        ]" />
                    </div>

                    {{-- Botones --}}
                    <div class="col-12 text-end mt-3">
                        <a href="{{ route('services.index') }}" class="btn btn-secondary">
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
