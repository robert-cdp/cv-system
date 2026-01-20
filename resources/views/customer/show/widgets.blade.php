<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-success">
        <div class="inner">
            <h3>{{ $customer->completedTramitesCount() }}</h3>
            <p>Servicios Completos</p>
        </div>
        <i class="fas fa-check-circle small-box-icon"></i>
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-warning">
        <div class="inner">
            <h3>{{ $customer->pendingTramitesCount() }}</h3>
            <p>Servicios Pendientes</p>
        </div>
        <i class="fas fa-clock small-box-icon"></i>
    </div>
</div>

<div class="col-lg-4 col-6">
    <div class="small-box bg-gradient text-bg-info">
        <div class="inner">
            <h3>0</h3>
            <p>Servicios Activos</p>
        </div>
        <i class="fas fa-play-circle small-box-icon"></i>
    </div>
</div>
