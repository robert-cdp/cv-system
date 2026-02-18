@extends('main')

<x-ui.page-meta title="Crear Rol de Usuario" subtitle="Complete el formulario para registrar un nuevo rol de usuario"
    icon="person-lock" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('rol.update', $rol->slug) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre del Rol" icon="person" value="{{ $rol->name }}"/>
                    </div>
                </div>

                <x-form.actions submit="Actualizar Rol" cancel-route="{{ route('user.index') }}" />
            </form>
        </div>
    </div>
@endsection

