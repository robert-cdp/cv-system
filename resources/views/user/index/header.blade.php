<div class="card-header bg-white">
    <div class="row align-items-center g-2">
        <div class="col-md-12 text-md-end">
            <div class="btn-toolbar justify-content-md-end gap-2">

                <div class="dropdown">
                    <button class="btn btn-sm btn-outline-secondary dropdown-toggle" data-bs-toggle="dropdown">
                        <i class="fas fa-filter me-1"></i> Filtrar
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="#">Todos</a></li>
                        <li><a class="dropdown-item" href="#">Activos</a></li>
                        <li><a class="dropdown-item" href="#">Inactivos</a></li>
                    </ul>
                </div>

                <a href="{{ route('customer.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Nuevo Usuario
                </a>
            </div>
        </div>
    </div>
</div>