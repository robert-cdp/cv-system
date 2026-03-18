@props([
    'title' => 'Tabla',
    'icon' => 'fa-table',
    'columns' => [],
    'addRoute' => null,
    'addText' => 'Agregar Nuevo',
    'searchPlaceholder' => 'Buscar...',
    'perPage' => 10,
    'emptyMessage' => 'No hay registros disponibles',
    'emptyIcon' => 'fa-inbox',
])

<div class="card card-outline card-primary shadow-sm">
    {{-- Header --}}
    <div class="card-header bg-white border-bottom">
        <div class="row align-items-center g-3">
            <div class="col-md-6">
                <h5 class="mb-0 fw-semibold">
                    <x-ui.svg-icon name="{{ $icon }}" class="text-primary me-2" />
                    {{ $title }}
                    <span class="badge bg-primary ms-2 table-count">0</span>
                </h5>
            </div>

            <div class="col-md-6">
                <div class="d-flex gap-2 justify-content-md-end flex-wrap">

                    {{-- Búsqueda --}}
                    <div class="input-group input-group-sm" style="max-width: 280px;">
                        <span class="input-group-text bg-light border-end-0">
                            <x-ui.svg-icon name="search" class="text-muted" />
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0 table-search"
                            placeholder="{{ $searchPlaceholder }}" autocomplete="off">
                    </div>

                    {{-- Botón Agregar (Opcional) --}}
                    @if ($addRoute)
                        <a href="{{ $addRoute }}" class="btn btn-sm btn-primary">
                            <x-ui.svg-icon name="plus" class="me-1" /> {{ $addText }}
                        </a>
                    @endif

                </div>
            </div>
        </div>
    </div>

    {{-- Tabla --}}
    <div class="card-body p-0">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0 data-table" data-per-page="{{ $perPage }}">
                <thead class="table-light">
                    <tr>
                        @foreach ($columns as $column)
                            <th class="align-middle {{ $column['class'] ?? '' }}" style="{{ $column['style'] ?? '' }}">
                                <div
                                    class="d-flex align-items-center 
        {{ !empty($column['center']) ? 'justify-content-center' : '' }}">

                                    @if (isset($column['icon']))
                                        <x-ui.svg-icon name="{{ $column['icon'] }}" class="text-muted me-2" />
                                    @endif

                                    <span>{{ $column['label'] }}</span>
                                </div>
                            </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    {{ $slot }}
                </tbody>
            </table>
        </div>

        {{-- Estado vacío --}}
        <div class="empty-state text-center py-5" style="display: none;">
            <i class="fas {{ $emptyIcon }} fa-3x mb-3 text-muted"></i>
            <p class="text-muted mb-0">{{ $emptyMessage }}</p>
            @if ($addRoute)
                <a href="{{ $addRoute }}" class="btn btn-sm btn-primary mt-3">
                    <x-ui.svg-icon name="plus" class="me-1" /> {{ $addText }}
                </a>
            @endif
        </div>
    </div>

    {{-- Footer con paginación --}}
    <div class="card-footer bg-white border-top">
        <div class="row align-items-center">
            <div class="col-md-6">
                <p class="text-muted mb-0 small pagination-info">
                    Mostrando <span class="showing-start">0</span> a <span class="showing-end">0</span>
                    de <span class="total-records">0</span> registros
                </p>
            </div>
            <div class="col-md-6">
                <nav aria-label="Paginación">
                    <ul class="pagination pagination-sm justify-content-md-end mb-0"></ul>
                </nav>
            </div>
        </div>
    </div>
</div>
