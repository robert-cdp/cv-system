@extends('main')

<x-page-meta title="Historial de Cajas" subtitle="Listado de aperturas y cierres de caja" icon="cash-stack" />

@section('content')
    <x-data-table title="Historial de Cajas" icon="cash-stack" :columns="[
        ['label' => '#', 'class' => 'text-center', 'style' => 'width: 60px;'],
        ['label' => 'Apertura', 'icon' => 'box-arrow-in-right'],
        ['label' => 'Cierre', 'icon' => 'box-arrow-left'],
        ['label' => 'Monto Inicial', 'icon' => 'cash'],
        ['label' => 'Monto Final', 'icon' => 'wallet2'],
        ['label' => 'Estado', 'icon' => 'toggle-on', 'class' => 'text-center'],
        ['label' => 'Acciones', 'class' => 'text-center', 'style' => 'width: 120px;'],
    ]" searchPlaceholder="Buscar caja..."
        :perPage="10" emptyMessage="No hay registros de cajas" emptyIcon="cash-stack">

        @foreach ($cashRegisters as $cash)
            <tr>
                {{-- # --}}
                <td class="text-center text-muted fw-semibold">
                    {{ $cash->id }}
                </td>

                {{-- Apertura --}}
                <td class="align-middle">
                    <div>
                        <small class="text-muted d-block">
                            <i class="far fa-calendar-alt"></i>
                            {{ $cash->opened_at->format('d/m/Y') }}
                        </small>

                        <span class="fw-bold text-primary d-block">
                            <i class="far fa-clock"></i>
                            {{ $cash->opened_at->format('h:i A') }}
                        </span>

                        <small class="text-muted">
                            {{ $cash->opened_at->diffForHumans() }}
                        </small>
                    </div>
                </td>


                {{-- Cierre --}}
                <td class="align-middle">
                    @if ($cash->closed_at)
                        <div>
                            <small class="text-muted d-block">
                                <i class="far fa-calendar-check"></i>
                                {{ $cash->closed_at->format('d/m/Y') }}
                            </small>

                            <span class="fw-bold text-success d-block">
                                <i class="far fa-clock"></i>
                                {{ $cash->closed_at->format('h:i A') }}
                            </span>

                            <small class="text-muted">
                                {{ $cash->closed_at->diffForHumans() }}
                            </small>

                            {{-- Duración --}}
                            <small class="text-info d-block">
                                <i class="fas fa-hourglass-half"></i>
                                {{ $cash->opened_at->diff($cash->closed_at)->format('%h h %i min') }}
                            </small>
                        </div>
                    @else
                        <span class="badge bg-warning text-dark">
                            <i class="fas fa-lock-open"></i> Abierta
                        </span>
                    @endif
                </td>

                {{-- Monto inicial --}}
                <td>
                    <span class="fw-semibold text-primary">
                        Q {{ number_format($cash->opening_amount, 2) }}
                    </span>
                </td>

                {{-- Monto final --}}
                <td>
                    @if ($cash->closing_amount)
                        <span class="fw-semibold text-success">
                            Q {{ number_format($cash->closing_amount, 2) }}
                        </span>
                    @else
                        <span class="text-muted">---</span>
                    @endif
                </td>

                {{-- Estado --}}
                <td class="text-center">
                    @if ($cash->closed_at)
                        <span class="badge bg-secondary">Cerrada</span>
                    @else
                        <span class="badge bg-success">Abierta</span>
                    @endif
                </td>

                {{-- Acciones --}}
                <td class="text-center">
                    <div class="d-flex justify-content-center gap-2">

                        <a href="{{ route('cash.show', $cash->id) }}" class="btn btn-outline-primary btn-sm"
                            data-bs-toggle="tooltip" title="Ver detalle">
                            <x-ui.svg-icon name="eye" />
                        </a>

                        @if (is_null($cash->closed_at))
                            <button class="btn btn-outline-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#closeCashModal" data-cash-id="{{ $cash->id }}" title="Cerrar caja">
                                <x-ui.svg-icon name="lock" />
                            </button>
                        @endif

                    </div>
                </td>
            </tr>
        @endforeach

    </x-data-table>

    <div class="modal fade" id="closeCashModal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header bg-danger">
                    <h5 class="modal-title">Cerrar Caja</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <p>¿Estás seguro de cerrar esta caja?</p>
                    <p class="text-muted small">
                        Esta acción registrará el cierre y no podrá modificarse.
                    </p>
                </div>

                <div class="modal-footer">
                    <form action="{{ route('cash.close') }}" method="POST">
                        @csrf

                        {{-- 🔥 aquí se inyecta el ID --}}
                        <input type="hidden" name="cash_id" id="cash_id">

                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            Cancelar
                        </button>

                        <button type="submit" class="btn btn-danger">
                            Sí, cerrar caja
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('closeCashModal');

            modal.addEventListener('show.bs.modal', function(event) {
                const button = event.relatedTarget;
                const cashId = button.getAttribute('data-cash-id');

                const input = modal.querySelector('#cash_id');
                input.value = cashId;
            });
        });
    </script>
@endsection
