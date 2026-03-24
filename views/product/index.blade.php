@extends('main')

<x-page-meta 
    title="Productos" 
    subtitle="Listado de productos registrados" 
    icon="box-seam" 
/>

@section('content')
    <x-data-table 
        title="Productos" 
        icon="box-seam" 
        :columns="[
            ['label' => '#', 'class' => 'text-center', 'style' => 'width: 60px;'],
            ['label' => 'Producto', 'icon' => 'box'],
            ['label' => 'Categoría', 'icon' => 'tag'],
            ['label' => 'Precio', 'icon' => 'cash'],
            ['label' => 'Stock', 'icon' => 'boxes'],
            ['label' => 'Estado', 'icon' => 'toggle-on', 'class' => 'text-center'],
            [
                'label' => 'Fecha Registro',
                'icon' => 'calendar-event',
                'class' => 'text-center',
                'style' => 'width: 180px;',
            ],
            ['label' => 'Acciones', 'class' => 'text-center', 'style' => 'width: 180px;'],
        ]"
        addRoute="{{ route('product.create') }}"
        addText="Nuevo Producto"
        searchPlaceholder="Buscar producto..."
        :perPage="10"
        emptyMessage="No hay productos registrados"
        emptyIcon="box-seam">

        @foreach ($products as $item)
            <tr>
                <td class="text-center text-muted fw-semibold">
                    {{ $item->id }}
                </td>

                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr($item->name, 0, 2)) }}
                        </div>
                        <div>
                            <div class="fw-semibold">{{ $item->name }}</div>
                            <small class="text-muted">
                                {{ Str::limit($item->description, 40) }}
                            </small>
                        </div>
                    </div>
                </td>

                <td>
                    <span class="badge bg-light text-dark">
                        {{ $item->category->name ?? 'Sin categoría' }}
                    </span>
                </td>

                <td>
                    <span class="fw-semibold text-success">
                        Q {{ number_format($item->price, 2) }}
                    </span>
                </td>

                <td>
                    <span class="badge {{ $item->stock > 0 ? 'bg-success' : 'bg-danger' }}">
                        {{ $item->stock }}
                    </span>
                </td>

                <td class="text-center">
                    @if ($item->status)
                        <span class="badge bg-success">Activo</span>
                    @else
                        <span class="badge bg-secondary">Inactivo</span>
                    @endif
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
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('product.edit', $item->slug) }}" 
                           class="btn btn-outline-primary"
                           data-bs-toggle="tooltip" 
                           title="Editar">
                            <x-ui.svg-icon name="pencil" />
                        </a>

                        <x-delete-button :action="route('product.destroy', $item->slug)" />
                    </div>
                </td>
            </tr>
        @endforeach

    </x-data-table>

    <x-delete-modal />
@endsection