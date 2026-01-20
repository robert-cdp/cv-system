<tbody>
@forelse ($services as $service)
    <tr>

        {{-- Servicio --}}
        <td>
            <strong>{{ $service->name }}</strong>

            @if($service->subtitle)
                <div class="text-muted small">
                    {{ $service->subtitle }}
                </div>
            @endif
        </td>

        {{-- Categoría --}}
        <td>
            <span class="text-muted">
                {{ $service->category?->name ?? '—' }}
            </span>
        </td>

        {{-- Precio --}}
        <td class="text-center">
            <span class="fw-semibold">
                ${{ number_format($service->price, 2) }}
            </span>
        </td>

        {{-- Estado --}}
        <td class="text-center">
            @if($service->is_active)
                <span class="badge bg-success">
                    Activo
                </span>
            @else
                <span class="badge bg-secondary">
                    Inactivo
                </span>
            @endif
        </td>

        {{-- Acciones --}}
        <td class="text-center">
            <div class="btn-group btn-group-sm">

                <a href="{{ route('services.edit', $service->slug) }}"
                   class="btn btn-outline-warning"
                   title="Editar">
                    <i class="fas fa-edit"></i>
                </a>

                <button type="button"
                        class="btn btn-outline-danger"
                        title="Eliminar"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteServiceModal"
                        data-action="{{ route('services.destroy', $service->slug) }}">
                    <i class="fas fa-trash"></i>
                </button>

            </div>
        </td>

    </tr>
@empty
    <tr>
        <td colspan="5" class="text-center py-5">
            <div class="d-flex flex-column align-items-center gap-2 text-muted">
                <i class="fas fa-cogs fa-2x"></i>
                <strong>No hay servicios registrados</strong>
                <span class="small">
                    Cuando crees servicios aparecerán aquí
                </span>
            </div>
        </td>
    </tr>
@endforelse
</tbody>
