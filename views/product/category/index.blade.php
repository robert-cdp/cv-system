@extends('main')

<x-page-meta title="Categorías de Productos" subtitle="Listado de categorías de productos" icon="tag" />

@section('content')
    <x-data-table title="Categorías" icon="tag" :columns="[
        ['label' => '#', 'class' => 'text-center', 'style' => 'width: 60px;'],
        ['label' => 'Nombre', 'icon' => 'tag'],
        ['label' => 'Descripción', 'icon' => 'card-text'],
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
    ]" addRoute="{{ route('product.categories.create') }}"
        addText="Nueva Categoría" searchPlaceholder="Buscar categoría..." :perPage="10"
        emptyMessage="No hay categorías registradas" emptyIcon="tag">

        @foreach ($categories as $item)
            <tr>
                <td class="text-center text-muted fw-semibold">
                    {{ $item->id }}
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr($item->name, 0, 2)) }}
                        </div>
                        <div class="fw-semibold">
                            {{ $item->name }}
                        </div>
                    </div>
                </td>

                <td>
                    <span class="text-muted">
                        {{ $item->description ?? 'Sin descripción' }}
                    </span>
                </td>

                <td class="text-center">
                    <span class="text-muted">
                        {{ $item->created_at?->format('d/m/Y') ?? 'N/A' }}
                    </span>
                    <br>
                    <small class="text-muted">
                        {{ $item->created_at?->diffForHumans() }}
                    </small>
                </td>

                <td class="text-center">
                    <span class="text-muted">
                        {{ $item->updated_at?->format('d/m/Y') ?? 'N/A' }}
                    </span>
                    <br>
                    <small class="text-muted">
                        {{ $item->updated_at?->diffForHumans() }}
                    </small>
                </td>

                <td class="text-center">
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('product.categories.edit', $item->slug) }}" class="btn btn-outline-primary"
                            data-bs-toggle="tooltip" title="Editar">
                            <x-ui.svg-icon name="pencil" />
                        </a>

                        <x-delete-button :action="route('product.categories.destroy', $item->slug)" />
                    </div>
                </td>
            </tr>
        @endforeach

    </x-data-table>

    <x-delete-modal />
@endsection
