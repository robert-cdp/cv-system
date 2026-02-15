<tbody>
    @forelse ($users as $user)
        <tr>
            <td class="fw-medium">
                {{ $loop->iteration }}
            </td>
            <td class="fw-medium">
                {{ $user->name }}
            </td>
            <td class="fw-medium">
                {{ $user->email }}
            </td>
            <td class="fw-medium">
                {{ $user->created_at->format('d/m/Y') }}
            </td>
            <td class="text-center">
                <div class="btn-group btn-group-sm">

                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-outline-warning" title="Editar">
                        <i class="fas fa-edit"></i>
                    </a>

                    <button type="button" class="btn btn-outline-danger" title="Eliminar" data-bs-toggle="modal"
                        data-bs-target="#deleteUserModal"
                        data-action="{{ route('user.destroy', $user->slug) }}">
                        <i class="fas fa-trash"></i>
                    </button>

                </div>
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="5" class="text-center py-5">
                <div class="d-flex flex-column align-items-center gap-2 text-muted">
                    <i class="fas fa-users-slash fa-2x"></i>
                    <strong>No hay usuarios registrados</strong>
                    <span class="small">
                        Cuando agregues usuarios aparecerán aquí
                    </span>
                </div>
            </td>
        </tr>
    @endforelse
</tbody>
