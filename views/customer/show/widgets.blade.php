<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-success">
        <div class="inner">
            <h3>{{ $customer->completedTramitesCount() }}</h3>
            <p>Servicios Completos</p>
        </div>

        <x-ui.svg-icon name="check-circle-fill" class="small-box-icon" />
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-warning">
        <div class="inner">
            <h3>{{ $customer->pendingTramitesCount() }}</h3>
            <p>Servicios Pendientes</p>
        </div>

        <x-ui.svg-icon name="clock-fill" class="small-box-icon" />
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-info">
        <div class="inner">
            <h3>0</h3>
            <p>Servicios Activos</p>
        </div>

        <x-ui.svg-icon name="play-circle-fill" class="small-box-icon" />
    </div>
</div>