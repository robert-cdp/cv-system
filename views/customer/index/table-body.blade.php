<tbody>
@forelse ($customers as $customer)
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
                <a href="{{ route('customer.show', $customer->dpi) }}" class="btn btn-outline-primary">
                    <i class="fas fa-eye"></i>
                </a>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center py-5">
            <div class="d-flex flex-column align-items-center gap-2 text-muted">
                <i class="fas fa-users-slash fa-2x"></i>
                <strong>No hay clientes registrados</strong>
                <span class="small">
                    Cuando agregues clientes aparecerán aquí
                </span>
            </div>
        </td>
    </tr>
@endforelse
</tbody>
