@extends('main')

<x-ui.page-meta title="Usuarios del Sistema" subtitle="Administre a los usuarios con acceso al sistema" icon="people" />

@section('content')
    <div class="card card-outline card-primary shadow-sm">
        <div class="px-3 py-2 border-bottom d-flex justify-content-between align-items-center">
            <small class="text-muted d-flex align-items-center gap-1">
                <x-ui.svg-icon name="people" />
                <span>Total: {{ $users->count() }} usuarios</span>
            </small>
            <div class="d-flex gap-2">
                <a href="{{ route('user.create') }}" class="btn btn-sm btn-primary d-flex align-items-center gap-1">
                    <x-ui.svg-icon name="person-plus" />
                    <span>Nuevo usuario</span>
                </a>
            </div>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-light text-uppercase small">
                        <tr>
                            <th>#</th>
                            <th>
                                <x-ui.svg-icon name="person" class="me-1 text-muted" />
                                Nombre
                            </th>
                            <th>
                                <x-ui.svg-icon name="envelope" class="me-1 text-muted" />
                                Email
                            </th>
                            <th>
                                <x-ui.svg-icon name="calendar-check" class="me-1 text-muted" />
                                Fecha Registro
                            </th>
                            <th class="text-center">
                                <x-ui.svg-icon name="gear" class="text-muted" />
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="fw-medium">{{ $loop->iteration }}</td>

                                <td class="fw-medium">
                                    {{ $user->name }}
                                </td>

                                <td>
                                    {{ $user->email }}
                                </td>

                                <td>
                                    {{ $user->created_at->format('d/m/Y') }}
                                </td>
                                <td class="text-center">
                                    <div class="btn-group btn-group-sm">

                                        <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-outline-warning"
                                            title="Editar">
                                            <x-ui.svg-icon name="pencil" />
                                        </a>

                                        <button class="btn btn-outline-danger" data-bs-toggle="modal"
                                            data-bs-target="#deleteUserModal"
                                            data-action="{{ route('user.destroy', $user->slug) }}" title="Eliminar">
                                            <x-ui.svg-icon name="trash" />
                                        </button>

                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="d-flex flex-column align-items-center gap-3 text-muted">

                                        <x-ui.svg-icon name="people" class="opacity-50" />

                                        <strong>No hay usuarios registrados</strong>

                                        <span class="small">
                                            Empieza creando el primer usuario
                                        </span>

                                        <a href="{{ route('user.create') }}"
                                            class="btn btn-primary d-flex align-items-center gap-1 mt-2">
                                            <x-ui.svg-icon name="person-plus" />
                                            <span>Crear usuario</span>
                                        </a>

                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
