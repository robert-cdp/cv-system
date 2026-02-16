<li class="nav-item dropdown">
    @include('partials.header.notification.icon')

    <div class="dropdown-menu dropdown-menu-end border-0 shadow">
        @include('partials.header.notification.header')

        @include('partials.header.notification.message')

        <a href="#" class="dropdown-item dropdown-footer text-center fw-semibold">
            Ver todas las notificaciones
        </a>
    </div>
</li>
