@extends('main')

<x-page-meta title="Detalle de Caja" subtitle="Resumen financiero y operaciones" icon="cash-stack" />

@section('content')

    {{-- ===== FILA SUPERIOR: 4 métricas principales ===== --}}
    <div class="row g-3 mb-3">

        <div class="col-lg-3 col-sm-6">
            <div class="small-box text-bg-primary">
                <div class="inner">
                    <h3>Q {{ number_format($cashRegister->opening_amount, 2) }}</h3>
                    <p>Monto Inicial</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="cash" />
                </div>
                <a href="#"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Ver detalle <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="small-box text-bg-info">
                <div class="inner">
                    <h3>Q {{ number_format($totalSales, 2) }}</h3>
                    <p>Total Ventas</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="cart-check" />
                </div>
                <a href="#"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Ver ventas <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="small-box text-bg-green">
                <div class="inner">
                    <h3>Q {{ number_format($totalIngresos, 2) }}</h3>
                    <p>Ingresos</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="arrow-down-circle" />
                </div>
                <a href="#"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Ver ingresos <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                </a>
            </div>
        </div>

        <div class="col-lg-3 col-sm-6">
            <div class="small-box text-bg-danger">
                <div class="inner">
                    <h3>Q {{ number_format(abs($totalEgresos), 2) }}</h3>
                    <p>Egresos</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="arrow-up-circle" />
                </div>
                <a href="#"
                    class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                    Ver egresos <i class="bi bi-arrow-right-circle-fill ms-1"></i>
                </a>
            </div>
        </div>

    </div>

    <div class="row g-3 mb-4">

        <div class="col-md-6">
            <div class="small-box text-bg-success">
                <div class="inner">
                    <h3>Q {{ number_format($expected, 2) }}</h3>
                    <p>Saldo Esperado en Caja</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="calculator" />
                </div>
                <span class="small-box-footer text-white-50">
                    Calculado automáticamente
                </span>
            </div>
        </div>

        <div class="col-md-6">
            @php
                $diffClass =
                    $difference === null
                        ? 'text-bg-secondary'
                        : ($difference == 0
                            ? 'text-bg-success'
                            : 'text-bg-warning');
                $diffLabel =
                    $difference === null
                        ? 'Caja aún abierta'
                        : ($difference == 0
                            ? 'Sin diferencia'
                            : 'Hay diferencia');
            @endphp
            <div class="small-box {{ $diffClass }}">
                <div class="inner">
                    <h3>
                        @if ($difference !== null)
                            Q {{ number_format(abs($difference), 2) }}
                        @else
                            ---
                        @endif
                    </h3>
                    <p>Diferencia al Cierre</p>
                </div>
                <div class="small-box-icon">
                    <x-ui.svg-icon name="graph-up-arrow" />
                </div>
                <span
                    class="small-box-footer
                {{ $difference === null ? 'text-white-50' : ($difference == 0 ? 'text-white-50' : 'text-dark') }}">
                    {{ $diffLabel }}
                </span>
            </div>
        </div>

    </div>

    {{-- ===== FILA INFERIOR: Movimientos y Ventas ===== --}}
    <div class="row g-3">

        {{-- Movimientos de Caja --}}
        <div class="col-lg-6">
            <div class="card card-outline card-primary h-100 shadow-sm">
                <div class="card-header d-flex align-items-center gap-2 border-bottom">
                    <x-ui.svg-icon name="arrow-left-right" class="text-primary" style="width:18px;height:18px;" />
                    <h3 class="card-title mb-0 fw-semibold">Movimientos de Caja</h3>
                    <span class="badge text-bg-primary ms-auto rounded-pill">
                        {{ $cashRegister->movements->count() }}
                    </span>
                </div>

                <div class="card-body p-0">
                    @forelse($cashRegister->movements as $mov)
                        @php
                            $isIncome = $mov->type === 'income';
                            $isExpense = $mov->type === 'expense';
                            $isSale = $mov->type === 'sale';
                            $iconName = $isIncome ? 'arrow-down-circle' : ($isExpense ? 'arrow-up-circle' : 'cart');
                            $colorClass = $isIncome ? 'text-success' : ($isExpense ? 'text-danger' : 'text-primary');
                            $badgeClass = $isIncome
                                ? 'text-bg-success'
                                : ($isExpense
                                    ? 'text-bg-danger'
                                    : 'text-bg-primary');
                            $label = $isIncome ? 'Ingreso' : ($isExpense ? 'Egreso' : 'Venta');
                        @endphp

                        <div class="d-flex align-items-center gap-3 px-3 py-2 border-bottom">
                            {{-- Ícono tipo --}}
                            <div class="flex-shrink-0 d-flex align-items-center justify-content-center rounded-circle bg-body-secondary"
                                style="width:38px;height:38px;">
                                <x-ui.svg-icon name="{{ $iconName }}" class="{{ $colorClass }}"
                                    style="width:18px;height:18px;" />
                            </div>

                            {{-- Descripción --}}
                            <div class="flex-grow-1 min-width-0">
                                <div class="d-flex align-items-center gap-2">
                                    <span class="badge {{ $badgeClass }} rounded-pill small">{{ $label }}</span>
                                </div>
                                <p class="text-muted small mb-0 text-truncate">
                                    {{ $mov->description ?? 'Sin descripción' }}
                                </p>
                            </div>

                            {{-- Monto --}}
                            <span class="{{ $colorClass }} fw-bold text-nowrap">
                                Q {{ number_format(abs($mov->amount), 2) }}
                            </span>
                        </div>

                    @empty
                        <div class="d-flex flex-column align-items-center justify-content-center py-5 text-muted">
                            <x-ui.svg-icon name="inbox" style="width:40px;height:40px;opacity:.3;" />
                            <p class="mt-2 mb-0 small">Sin movimientos registrados</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- Ventas --}}
        <div class="col-lg-6">
            <div class="card card-outline card-success h-100 shadow-sm">
                <div class="card-header d-flex align-items-center gap-2 border-bottom">
                    <x-ui.svg-icon name="bag-check" class="text-success" style="width:18px;height:18px;" />
                    <h3 class="card-title mb-0 fw-semibold">Ventas Registradas</h3>
                    <span class="badge text-bg-success ms-auto rounded-pill">
                        {{ $cashRegister->sales->count() }}
                    </span>
                </div>

                <div class="card-body p-3">
                    @forelse($cashRegister->sales as $sale)
                        <div class="border rounded-3 p-3 mb-2 bg-body-tertiary">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <div class="d-flex align-items-center gap-2">
                                    <x-ui.svg-icon name="receipt" class="text-success" style="width:15px;height:15px;" />
                                    <span class="fw-semibold small">Venta #{{ $sale->id }}</span>
                                </div>
                                <span class="badge text-bg-success fs-6 px-3 py-1">
                                    Q {{ number_format($sale->total, 2) }}
                                </span>
                            </div>

                            <ul class="list-unstyled mb-0 ps-1">
                                @foreach ($sale->items as $item)
                                    <li
                                        class="d-flex justify-content-between align-items-center text-muted small py-1 border-bottom border-dashed">
                                        <span class="text-truncate me-2">
                                            <i class="bi bi-dot me-1"></i>{{ $item->product->name }}
                                            <span class="badge text-bg-secondary ms-1">×{{ $item->quantity }}</span>
                                        </span>
                                        <span class="text-body fw-medium text-nowrap">
                                            Q {{ number_format($item->subtotal, 2) }}
                                        </span>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @empty
                        <div class="d-flex flex-column align-items-center justify-content-center py-5 text-muted">
                            <x-ui.svg-icon name="cart-x" style="width:40px;height:40px;opacity:.3;" />
                            <p class="mt-2 mb-0 small">Sin ventas registradas</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

    </div>

@endsection
