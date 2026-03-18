@extends('main')

<x-ui.page-meta title="Administrar Clientes"
    subtitle="Administre, edite y supervise la información de todos sus clientes desde un solo lugar."
    icon="person-check-fill" />

@section('content')
    <x-data-table title="Clientes" icon="people" :columns="[
        ['label' => 'DPI', 'icon' => 'person-vcard'],
        ['label' => 'NIT', 'icon' => 'receipt'],
        ['label' => 'Nombre Completo', 'icon' => 'person'],
        [
            'label' => 'Fecha Nacimiento',
            'icon' => 'calendar-date',
            'class' => 'text-center',
            'style' => 'width: 180px;',
        ],
        [
            'label' => 'Acciones',
            'class' => 'text-center',
            'style' => 'width: 120px;',
        ],
    ]" searchPlaceholder="Buscar cliente..." :perPage="10"
        emptyMessage="No hay clientes registrados" emptyIcon="people">

        @foreach ($customers as $customer)
            <tr>

                {{-- DPI --}}
                <td class="fw-medium">
                    {{ $customer->dpi }}
                </td>

                {{-- NIT --}}
                <td class="text-muted">
                    {{ $customer->nit ?? '—' }}
                </td>

                {{-- Nombre --}}
                <td>
                    <div class="d-flex align-items-center">
                        <div class="avatar-circle me-2">
                            {{ strtoupper(substr($customer->full_name, 0, 2)) }}
                        </div>

                        <div class="fw-semibold">
                            {{ $customer->full_name }}
                        </div>
                    </div>
                </td>

                {{-- Fecha nacimiento --}}
                <td class="text-center text-muted">
                    {{ optional($customer->birthday)->format('d/m/Y') ?? '—' }}
                </td>

                {{-- Acciones --}}
                <td class="text-center">
                    <div class="btn-group btn-group-sm">
                        <a href="{{ route('customer.show', $customer->dpi) }}" class="btn btn-outline-primary"
                            data-bs-toggle="tooltip" title="Ver cliente">
                            <x-ui.svg-icon name="eye" />
                        </a>
                    </div>
                </td>

            </tr>
        @endforeach
    </x-data-table>
    <x-delete-modal />
@endsection
