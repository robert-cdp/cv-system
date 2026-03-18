@extends('main')

@section('title', 'Recuperar cuenta')

@section('sub-title', 'Bienvenido, recupera tu cuenta rapidamente.')
    
@section('auth-content')
    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="mb-3 input-group input-group-lg">
            <span class="input-group-text bg-primary text-white">
                <x-ui.svg-icon name="envelope" />
                
            </span>
            <input type="email" name="email" class="form-control form-control-lg" placeholder="Correo electrónico" required
                autofocus>
        </div>

        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="{{ route('login') }}">Ir al Login</a>
        </div>

        <button type="submit" class="btn btn-primary btn-lg w-100 fw-bold">Recuperar</button>
    </form>
@endsection
