@extends('main')

<x-page-meta title="Editar Usuario" subtitle="Complete el formulario para editar al usuario" icon="person-plus" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h5 class="card-title mb-0">Datos del Usuario</h5>
        </div>

        <div class="card-body">
            <form action="{{ route('user.update', $user->slug) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre del usuario" icon="person" value="{{ $user->name }}" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="email" type="email" label="Email" icon="envelope" value="{{ $user->email }}" />
                    </div>
                </div>

                <x-form.actions submit="Actualizar Usuario" cancel-route="{{ route('user.index') }}" />
            </form>
        </div>
    </div>
@endsection
