@extends('app')

@section('title', 'Perfil de Usuario: ' . $user->name)

@section('content')
<div class="d-flex justify-content-between align-items-center mt-4">
    <h1 class="h3">@yield('title')</h1>
</div>

<form action="{{ route('users.update', $user->code) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Datos de Usuario</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="name" class="form-label">Nombre del Usuario <span class="text-danger">*</span></label>
                        <input type="text" name="name" id="name"
                            class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                            value="{{ old('name', $user->name) }}">
                        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="email"
                            class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}"
                            value="{{ old('email', $user->email) }}">
                        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary">Guardar</button>
    </div>
</form>

<form action="{{ route('users.changePassword', $user->code) }}" method="post">
    @csrf
    @method('PUT')
    <div class="card shadow-sm mt-5">
        <div class="card-header bg-primary text-white">
            <h5 class="card-title mb-0">Cambiar Contraseña</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="password" class="form-label">Contraseña Actual<span class="text-danger">*</span></label>
                        <input type="password" name="password" id="password"
                            class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                            value="{{ old('password') }}">
                        @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="new_password" class="form-label">Nueva Contraseña <span class="text-danger">*</span></label>
                        <input type="password" name="new_password" id="new_password"
                            class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                            value="{{ old('new_password') }}">
                        @error('new_password') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3">
                        <label for="password_confirmation" class="form-label">Confirmar Nueva Contraseña <span class="text-danger">*</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation"
                            class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                            value="{{ old('password_confirmation') }}">
                        @error('password_confirmation') <div class="invalid-feedback">{{ $message }}</div> @enderror
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-end mt-4">
        <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
    </div>
</form>
@endsection