<tbody>
@forelse ($categories as $category)
    <tr>
        <td>
            <strong>{{ $category->name }}</strong>
        </td>

        <td class="text-muted">
            {{ $category->description ?? '—' }}
        </td>

        <td class="text-center">
            <i class="{{ $category->icon }}"></i>
            <small class="text-muted d-block">{{ $category->icon }}</small>
        </td>

        <td class="text-center">
            <div class="btn-group btn-group-sm">
                <a href="{{ route('services.categories.edit', $category->slug) }}"
                class="btn btn-outline-warning"
                title="Editar">
                    <i class="fas fa-edit"></i>
                </a>

                <button type="button"
                        class="btn btn-outline-danger"
                        title="Eliminar"
                        data-bs-toggle="modal"
                        data-bs-target="#deleteCategoryModal"
                        data-action="{{ route('services.categories.destroy', $category->slug) }}">
                    <i class="fas fa-trash"></i>
                </button>
            </div>
        </td>
    </tr>
@empty
    <tr>
        <td colspan="4" class="text-center py-5">
            <div class="d-flex flex-column align-items-center gap-2 text-muted">
                <i class="fas fa-tags fa-2x"></i>
                <strong>No hay categorías registradas</strong>
                <span class="small">
                    Cuando crees categorías aparecerán aquí
                </span>
            </div>
        </td>
    </tr>
@endforelse
</tbody>
