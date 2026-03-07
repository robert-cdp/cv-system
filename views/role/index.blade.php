@extends('main')

<x-ui.page-meta 
    title="Administrar Roles"
    subtitle="Gestione los roles del sistema y controle los permisos asignados a cada usuario."
    icon="shield-lock-fill" 
/>

@section('content')
<div class="card card-outline card-primary shadow-sm">

    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle mb-0">

                <thead class="table-light text-uppercase small">
                    <tr>

                        <th>
                            <x-ui.svg-icon name="shield" class="me-1 text-muted" />
                            Rol
                        </th>

                        <th>
                            <x-ui.svg-icon name="key" class="me-1 text-muted" />
                            Permisos
                        </th>

                        <th>
                            <x-ui.svg-icon name="cpu" class="me-1 text-muted" />
                            Guard
                        </th>

                        <th>
                            <x-ui.svg-icon name="calendar-date" class="me-1 text-muted" />
                            Creado
                        </th>

                        <th class="text-center">
                            <x-ui.svg-icon name="three-dots" class="text-muted" />
                        </th>

                    </tr>
                </thead>

                <tbody>

                    @forelse ($roles as $role)
                        <tr>

                            <td class="fw-semibold">
                                {{ $role->name }}
                            </td>

                            <td>
                                <span class="badge bg-info">
                                    {{ $role->permissions->count() }}
                                </span>
                            </td>

                            <td class="text-muted">
                                {{ $role->guard_name }}
                            </td>

                            <td class="text-muted">
                                {{ $role->created_at->format('d/m/Y') }}
                            </td>

                            <td class="text-center">
                                <div class="btn-group btn-group-sm">

                                    <a href="{{ route('roles.show',$role->id) }}"
                                       class="btn btn-outline-primary">
                                        <x-ui.svg-icon name="eye"/>
                                    </a>

                                    <a href="{{ route('roles.edit',$role->id) }}"
                                       class="btn btn-outline-secondary">
                                        <x-ui.svg-icon name="pencil"/>
                                    </a>

                                </div>
                            </td>

                        </tr>
                    @empty

                        <tr>
                            <td colspan="5" class="text-center py-5">

                                <div class="d-flex flex-column align-items-center gap-2 text-muted">
                                    
                                    <x-ui.svg-icon name="shield-x" class="fs-1"/>

                                    <strong>No hay roles registrados</strong>

                                    <span class="small">
                                        Cuando crees roles aparecerán aquí
                                    </span>

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