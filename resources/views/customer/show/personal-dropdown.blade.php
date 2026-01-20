<div class="dropdown mt-2">
    <button class="btn btn-primary btn-sm dropdown-toggle w-100 d-flex justify-content-between align-items-center"
        type="button" id="customerActions" data-bs-toggle="dropdown" aria-expanded="false">
        Acciones
    </button>
    <ul class="dropdown-menu w-100" aria-labelledby="customerActions">
        <li>
            <a class="dropdown-item d-flex align-items-center"
                href="{{ route('customer.service.create', $customer->dpi) }}">
                <i class="fas fa-plus me-2"></i> Agregar Servicio
            </a>
        </li>
        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('customer.edit', $customer->dpi) }}">
                <i class="fas fa-edit me-2"></i> Editar Información Personal
            </a>
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-center" href="{{ route('tramite.print', $customer->dpi) }}">
                <i class="fas fa-print me-2"></i> Imprimir Constancia Trámites
            </a>
        </li>

        <li>
            <hr class="dropdown-divider">
        </li>
        <li>
            <button type="button" class="dropdown-item d-flex align-items-center text-danger" title="Eliminar"
                data-bs-toggle="modal" data-bs-target="#deleteCustomer"
                data-action="{{ route('customer.destroy', $customer->id) }}">
                <i class="fas fa-trash me-2"></i> Eliminar Cliente
            </button>
        </li>

    </ul>
</div>
