<div class="row">
    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-primary">
            <div class="inner">
                <h3>{{ $totalCustomers }}</h3>
                <p>Clientes Registrados</p>
            </div>
            <div class="small-box-icon">
                <x-ui.svg-icon name="people"/>
            </div>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Ir <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-success">
            <div class="inner">
                <h3>{{ $totalTramites }}</h3>
                <p>Trámites Completados</p>
            </div>
            <div class="small-box-icon">
                <x-ui.svg-icon name="check-circle"/>
            </div>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Ir <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-warning">
            <div class="inner">
                <h3>{{ $totalTramitesPending }}</h3>
                <p>Trámites Pendientes</p>
            </div>
            <div class="small-box-icon">
                <x-ui.svg-icon name="hourglass-split"/>
            </div>
            <a href="#" class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover">
                Ir <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>

    <div class="col-lg-3 col-6">
        <div class="small-box text-bg-info">
            <div class="inner">
                <h3>{{ $totalUsers }}</h3>
                <p>Personal Activo</p>
            </div>
            <div class="small-box-icon">
                <x-ui.svg-icon name="person-check"/>
            </div>
            <a href="#" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                Ir <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
</div>