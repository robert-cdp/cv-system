<div class="card card-outline card-primary">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-light text-uppercase small">
                    <tr>
                        <th>
                            <i class="fas fa-id-card me-1 text-muted"></i>
                            DPI
                        </th>

                        <th>
                            <i class="fas fa-receipt me-1 text-muted"></i>
                            NIT
                        </th>

                        <th>
                            <i class="fas fa-user me-1 text-muted"></i>
                            Cliente
                        </th>

                        <th>
                            <i class="fas fa-calendar-alt me-1 text-muted"></i>
                            Fecha Nac.
                        </th>

                        <th class="text-center">
                            <i class="fas fa-ellipsis-h text-muted"></i>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($customers as $customer)
                        <tr>
                            <td class="fw-medium">
                                {{ $customer->dpi }}
                            </td>

                            <td class="text-muted">
                                {{ $customer->nit ?? '—' }}
                            </td>

                            <td>
                                <div class="fw-semibold">
                                    {{ $customer->full_name }}
                                </div>
                            </td>

                            <td class="text-muted">
                                {{ optional($customer->birthday)->format('d/m/Y') ?? '—' }}
                            </td>

                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="{{ route('customer.show', $customer->dpi) }}"
                                        class="btn btn-outline-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>
