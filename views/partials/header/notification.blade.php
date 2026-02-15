<li class="nav-item dropdown">
    <a class="nav-link" data-bs-toggle="dropdown" href="#">
        <div class="d-flex align-items-center">
            <x-svg-icon name="bell" class="me-1" />
            <span class="navbar-badge badge bg-warning">15</span>
        </div>
    </a>

    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-end shadow">
        <span class="dropdown-item dropdown-header fw-semibold">
            15 Notificaciones
        </span>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item d-flex align-items-start gap-2">
            <x-svg-icon name="person" class="text-primary flex-shrink-0 mt-1" />
            <div class="flex-grow-1">
                <div class="fw-semibold">Nuevo usuario registrado</div>
                <small class="text-muted">Hace 3 minutos</small>
            </div>
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item d-flex align-items-start gap-2">
            <x-svg-icon name="mail" class="text-warning flex-shrink-0 mt-1" />
            <div class="flex-grow-1">
                <div class="fw-semibold">4 mensajes nuevos</div>
                <small class="text-muted">Hace 10 minutos</small>
            </div>
        </a>

        <div class="dropdown-divider"></div>

        <a href="#" class="dropdown-item dropdown-footer text-center fw-semibold">
            Ver todas las notificaciones
        </a>
    </div>
</li>
