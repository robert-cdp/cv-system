<tbody>
@forelse ($latestPendingTramites as $tramite)
    <tr>
        <td class="text-center fw-semibold">
            {{ $loop->iteration }}
        </td>

        <td>
            <div class="fw-semibold">
                {{ $tramite->customerService?->customer?->full_name ?? 'Sin cliente' }}
            </div>
            <small class="text-muted">Cliente</small>
        </td>

        <td>
            <span class="badge rounded-pill text-bg-warning">
                {{ $tramite->customerService?->service?->name ?? 'Servicio' }}
            </span>
        </td>

        <td class="text-center">
            @if($tramite->customerService?->customer?->dpi)
                <a href="{{ route('customer.show', $tramite->customerService->customer->dpi) }}"
                   class="btn btn-sm btn-outline-primary">
                    <x-ui.svg-icon name="eye" />
                </a>
            @else
                <span class="text-muted">—</span>
            @endif
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center text-muted">
            No hay trámites pendientes.
        </td>
    </tr>
@endforelse
</tbody>
