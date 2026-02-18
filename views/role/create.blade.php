@extends('main')

<x-ui.page-meta title="Crear Rol de Usuario" subtitle="Complete el formulario para registrar un nuevo rol de usuario"
    icon="person-lock" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form action="{{ route('roles.store') }}" method="POST">
                @csrf

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre del Rol" icon="person" />
                    </div>
                </div>

                <x-form.actions submit="Guardar Rol" cancel-route="{{ route('user.index') }}" />
            </form>
        </div>
    </div>
@endsection
