<tbody>
    @forelse ($tramites as $tramite)
        <tr>
            <td class="fw-medium">
                {{ $tramite->customerService->customer->dpi }}
            </td>
            <td class="fw-medium">
                {{ $tramite->customerService->customer->full_name }}
            </td>
            <td class="fw-medium">
                {{ $tramite->status }}
            </td>
            <td class="fw-medium">

            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-5">
                <div class="d-flex flex-column align-items-center gap-2 text-muted">
                    <i class="fas fa-users-slash fa-2x"></i>
                    <strong>No hay Trámites registrados.</strong>
                    <span class="small">
                        Cuando se registren trámites aparecerán aquí.
                    </span>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>
