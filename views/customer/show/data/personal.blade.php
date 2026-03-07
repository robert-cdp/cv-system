<div class="dropdown mb-2">
    <button class="btn btn-primary btn-sm dropdown-toggle w-100 d-flex justify-content-between align-items-center"
        type="button" id="customerActions" data-bs-toggle="dropdown" aria-expanded="false">
        Acciones
    </button>

    <ul class="dropdown-menu w-100" aria-labelledby="customerActions">
        <li>
            <a class="dropdown-item d-flex align-items-start gap-2 text-wrap"
                href="{{ route('customer.service.create', $customer->dpi) }}">
                <x-ui.svg-icon name="plus-circle" />
                <span>Agregar Servicio</span>
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <a class="dropdown-item d-flex align-items-start gap-2 text-wrap"
                href="{{ route('customer.edit', $customer->dpi) }}">
                <x-ui.svg-icon name="pencil" />
                <span>Editar Información Personal</span>
            </a>
        </li>

        <li>
            <a class="dropdown-item d-flex align-items-start gap-2 text-wrap"
                href="{{ route('tramite.print', $customer->dpi) }}">
                <x-ui.svg-icon name="printer" />
                <span>Imprimir Constancia Trámites</span>
            </a>
        </li>

        <li><hr class="dropdown-divider"></li>

        <li>
            <button type="button"
                class="dropdown-item d-flex align-items-start gap-2 text-danger text-wrap"
                data-bs-toggle="modal"
                data-bs-target="#deleteCustomer"
                data-action="{{ route('customer.destroy', $customer->id) }}">
                
                <x-ui.svg-icon name="trash" />
                <span>Eliminar Cliente</span>
            </button>
        </li>
    </ul>
</div>