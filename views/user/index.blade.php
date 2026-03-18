@extends('main')

<x-page-meta title="Usuarios" subtitle="Listado de usuarios registrados" icon="person-badge" />

@section('content')
    <x-data-table
        title="Usuarios"
        icon="person-badge"
        :columns="[
            ['label' => '#', 'class' => 'text-center', 'style' => 'width: 60px;'],
            ['label' => 'Usuario', 'icon' => 'person'],
            ['label' => 'Email', 'icon' => 'envelope'],
            [
                'label' => 'Fecha Registro',
                'icon' => 'calendar-event',
                'class' => 'text-center',
                'style' => 'width: 200px;',
            ],
            [
                'label' => 'Actualizado',
                'icon' => 'clock-history',
                'class' => 'text-center',
                'style' => 'width: 200px;',
            ],
            ['label' => 'Acciones', 'class' => 'text-center', 'style' => 'width: 180px;'],
        ]"
        addRoute="{{ route('user.create') }}"
        addText="Nuevo Usuario"
        searchPlaceholder="Buscar usuario..."
        :perPage="10"
        emptyMessage="No hay usuarios registrados"
        emptyIcon="person-x"
    >

        @foreach ($users as $item)
            <tr>
                {{-- # --}}
                <td class="text-center text-muted fw-semibold">
                    {{ $item->code }}
                </td>

                {{-- Usuario --}}
                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr($item->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="fw-semibold">{{ $item->name }}</div>
                        </div>
                    </div>
                </td>

                {{-- Email --}}
                <td>
                    <a href="mailto:{{ $item->email }}" class="text-decoration-none">
                        {{ $item->email }}
                    </a>
                </td>

                {{-- Fecha creación --}}
                <td class="text-center">
                    <span class="text-muted">
                        {{ $item->created_at?->format('d/m/Y') ?? 'N/A' }}
                    </span>
                    <br>
                    <small class="text-muted">
                        {{ $item->created_at?->diffForHumans() }}
                    </small>
                </td>

                {{-- Fecha actualización --}}
                <td class="text-center">
                    <span class="text-muted">
                        {{ $item->updated_at?->format('d/m/Y') ?? 'N/A' }}
                    </span>
                    <br>
                    <small class="text-muted">
                        {{ $item->updated_at?->diffForHumans() }}
                    </small>
                </td>

                {{-- Acciones --}}
                <td class="text-center">
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('user.edit', $item->slug) }}" class="btn btn-outline-primary"
                            data-bs-toggle="tooltip" title="Editar">
                            <x-ui.svg-icon name="pencil" />
                        </a>

                        <x-delete-button :action="route('user.destroy', $item->slug)" />

                    </div>
                </td>
            </tr>
        @endforeach

    </x-data-table>
    <x-delete-modal />
@endsection
