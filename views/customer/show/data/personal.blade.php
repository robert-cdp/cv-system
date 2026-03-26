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

        <li>
            <hr class="dropdown-divider">
        </li>

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

        <li>
            <hr class="dropdown-divider">
        </li>

        <li>
            <button type="button" class="dropdown-item d-flex align-items-start gap-2 text-danger text-wrap"
                data-bs-toggle="modal" data-bs-target="#deleteCustomer"
                data-action="{{ route('customer.destroy', $customer->id) }}">

                <x-ui.svg-icon name="trash" />
                <span>Eliminar Cliente</span>
            </button>
        </li>
    </ul>
</div>
<div class="card card-primary card-outline mb-4">

    <div class="card-header text-center">
        <div class="text-muted mb-1">
            <x-ui.svg-icon name="person" class="me-1" />
            Nombre Completo
        </div>
        <div class="fw-semibold">
            {{ $customer->full_name }}
        </div>
    </div>

    <div class="card-body p-0">

        <ul class="list-group list-group-flush">

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="text-muted">
                    <x-ui.svg-icon name="card-text" class="me-1" />
                    DPI
                </span>
                <span class="fw-semibold">{{ $customer->dpi }}</span>
            </li>

            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="text-muted">
                    <x-ui.svg-icon name="credit-card" class="me-1" />
                    NIT
                </span>
                <span class="fw-semibold">{{ $customer->nit }}</span>
            </li>


            <li class="list-group-item d-flex justify-content-between align-items-center">
                <span class="text-muted">
                    <x-ui.svg-icon name="calendar" class="me-1" />
                    Nacimiento
                </span>
                <span class="fw-semibold">{{ $customer->birthday->format('d/m/Y') }}</span>
            </li>

        </ul>

    </div>

</div>
