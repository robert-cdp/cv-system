@extends('main')

<x-page-meta title="Crear Usuario" subtitle="Complete el formulario para registrar un nuevo usuario" icon="person-plus" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title mb-0">Datos del Usuario</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('user.store') }}" method="post">
                @csrf

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre del usuario" icon="person" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="email" type="email" label="Email" icon="envelope" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="password" type="password" label="Contraseña" icon="lock" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="password_confirmation" type="password" label="Confirmar contraseña"
                            icon="lock-fill" />
                    </div>
                </div>

                <x-form.actions submit="Guardar Usuario" cancel-route="{{ route('user.index') }}" />
            </form>
        </div>
    </div>
@endsection
