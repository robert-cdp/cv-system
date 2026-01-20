@extends('main')

@section('title', 'Iniciar Sesion')

@section('sub-title', 'Bienvenido, inicia sesión para continuar')
    
@section('auth-content')
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div class="mb-3 input-group input-group-lg">
            <span class="input-group-text bg-primary text-white"><i class="fas fa-envelope"></i></span>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Correo electrónico" required
                autofocus>
        </div>

        <div class="mb-3 input-group input-group-lg">
            <span class="input-group-text bg-primary text-white"><i class="fas fa-lock"></i></span>
            <input type="password" name="password" class="form-control form-control-lg" placeholder="Contraseña" required>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">
            <div class="form-check">
                <input type="checkbox" name="remember" class="form-check-input" id="remember">
                <label class="form-check-label" for="remember">Recordarme</label>
            </div>
            <a href="{{ route('password.request') }}">Olvidé mi contraseña</a>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">Iniciar sesión</button>
    </form>
@endsection
