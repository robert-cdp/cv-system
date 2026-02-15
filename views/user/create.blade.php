@extends('main')

@section('title', 'Crear Usuario')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('user.store') }}">
                @csrf

                <div class="row g-3">

                    {{-- Nombre --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre" icon="fas fa-user" placeholder="Ej: Juan Pérez" required />
                    </div>

                    {{-- Email --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="email" label="Correo electrónico" icon="fas fa-envelope" type="email"
                            placeholder="ejemplo@correo.com" required />
                    </div>

                    {{-- Contraseña --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="password" label="Contraseña" icon="fas fa-lock" type="password"
                            placeholder="********" required />
                    </div>

                    {{-- Confirmar contraseña --}}
                    <div class="col-12 col-md-6">
                        <x-form.input name="password_confirmation" label="Confirmar contraseña" icon="fas fa-lock"
                            type="password" placeholder="********" required />
                    </div>

                    {{-- Botones --}}
                    <div class="col-12 text-end mt-3">
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
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
