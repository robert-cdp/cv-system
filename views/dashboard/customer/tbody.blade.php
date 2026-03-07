<tbody>
    @forelse ($latestCustomers as $customer)
        <tr>
            <td class="text-center fw-semibold">{{ $loop->iteration }}</td>

            <td>
                <span class="fw-monospace">{{ $customer->dpi ?? '-' }}</span>
            </td>

            <td>
                <div class="fw-semibold">{{ $customer->full_name ?? 'Sin nombre' }}</div>
                <small class="text-muted">Nuevo registro</small>
            </td>

            <td class="text-center">
                <a href="{{ route('customer.show', $customer->dpi) }}" class="btn btn-sm btn-outline-primary">
                    <x-ui.svg-icon name="eye" />
                </a>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="4" class="text-center text-muted">No hay clientes recientes.</td>
        </tr>
    @endforelse
</tbody>
