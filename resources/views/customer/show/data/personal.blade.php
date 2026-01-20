<div class="card card-primary card-outline mb-4">
    <div class="card-header">
        <h3 class="text-center">
            {{ $customer->full_name }}
        </h3>

        @include('customer.show.personal-dropdown')
    </div>
    <div class="card-body box-profile">
        <ul class="list-group list-group-flush">
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-id-card me-2 text-primary"></i>
                <span class="flex-grow-1"><b>DPI</b></span>
                <span>{{ $customer->dpi }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-file-invoice me-2 text-primary"></i>
                <span class="flex-grow-1"><b>NIT</b></span>
                <span>{{ $customer->nit ?? '-' }}</span>
            </li>
            <li class="list-group-item d-flex align-items-center">
                <i class="fas fa-calendar-alt me-2 text-primary"></i>
                <span class="flex-grow-1"><b>Fecha Nac.</b></span>
                <span>{{ $customer->birthday->format('d/m/Y') }}</span>
            </li>
        </ul>
    </div>
</div>
