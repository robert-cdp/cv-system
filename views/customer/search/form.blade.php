<form id="searchForm" action="{{ route('customer.search.result') }}" method="POST">
    @csrf

    <div class="card card-outline card-primary mb-4">
        <div class="card-body">

            <div class="row g-3 align-items-end">

                <div class="col-xl-3 col-lg-4">
                    <x-form.select name="search_type" label="Buscar por" icon="funnel" id="searchType"
                        :options="[
                            'dpi' => 'DPI',
                            'nit' => 'NIT',
                            'full_name' => 'Nombre completo',
                            'birthday' => 'Fecha de nacimiento',
                        ]" />
                </div>

                <div class="col-xl-6 col-lg-5">
                    <x-form.input name="search_value" label="Valor de búsqueda" icon="search"
                        id="searchValue" placeholder="Escriba para buscar clientes" />
                </div>

                <div class="col-xl-3 col-lg-3 text-end">
                    <button type="button" id="clearBtn" class="btn btn-outline-secondary me-2">
                        <x-ui.svg-icon name="eraser" />
                        Limpiar
                    </button>

                    <button type="submit" class="btn btn-primary">
                        <x-ui.svg-icon name="search" />
                        Buscar
                    </button>
                </div>
            </div>
        </div>
    </div>
</form>
