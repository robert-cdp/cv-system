<div class="card-header bg-white">
    <div class="row align-items-center g-2">

        {{-- INFO --}}
        <div class="col-md-4">
            <span class="badge bg-primary">
                Total registrados
            </span>
        </div>

        {{-- ACCIONES --}}
        <div class="col-md-8 text-md-end">
            <div class="btn-toolbar justify-content-md-end gap-2">

                {{-- BUSCADOR --}}
                <div class="input-group input-group-sm" style="width:220px">
                    <span class="input-group-text bg-light">
                        <i class="fa fa-search"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Buscar...">
                </div>

                {{-- FILTROS --}}
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

                {{-- NUEVA --}}
                <a href="{{ route('services.create') }}" class="btn btn-sm btn-primary">
                    <i class="fas fa-plus me-1"></i> Agregar
                </a>
            </div>
        </div>

    </div>
</div>