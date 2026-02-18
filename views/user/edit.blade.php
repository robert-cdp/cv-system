@extends('main')

<x-ui.page-meta title="Editar Usuario" subtitle="Complete el formulario para editar al usuario"
    icon="person-exclamation" />

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-body">
            <form method="POST" action="{{ route('user.update', $user->slug) }}">
                @csrf
                @method('PUT')

                <div class="row g-3">
                    <div class="col-12 col-md-6">
                        <x-form.input name="name" label="Nombre del usuario" icon="person" value="{{ $user->name }}" />
                    </div>

                    <div class="col-12 col-md-6">
                        <x-form.input name="email" type="email" label="Email" icon="envelope"
                            value="{{ $user->email }}" />
                    </div>
                </div>

                <x-form.actions submit="Editar Usuario" cancel-route="{{ route('user.index') }}" />
            </form>
        </div>
    </div>
@endsection
