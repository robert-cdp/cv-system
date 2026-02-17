<div class="p-3">
    <form method="POST" action="{{ route('logout') }}">
        @csrf
        <button type="submit" class="btn btn-outline-danger w-100 d-flex align-items-center justify-content-center">
            <x-svg-icon name="box-arrow-right" class="me-2" />
            Cerrar Sesión
        </button>
    </form>
</div>
