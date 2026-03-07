<div class="card card-outline card-primary">
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">
                <thead class="table-light text-uppercase small">
                    <tr>
                        <th>
                            <x-ui.svg-icon name="person-vcard" class="me-1 text-muted" />
                            DPI
                        </th>

                        <th>
                            <x-ui.svg-icon name="receipt" class="me-1 text-muted" />
                            NIT
                        </th>

                        <th>
                            <x-ui.svg-icon name="person" class="me-1 text-muted" />
                            NOMBRE COMPLETO
                        </th>

                        <th>
                            <x-ui.svg-icon name="calendar-date" class="me-1 text-muted" />
                            Fecha Nac.
                        </th>

                        <th class="text-center">
                            <x-ui.svg-icon name="three-dots" class="text-muted" />
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
                                        <x-ui.svg-icon name="eye" />
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
