<div class="col-lg-6">
    <div class="card card-outline card-warning shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title fw-semibold">
                <i class="fas fa-hourglass-half me-2"></i>Trámites Pendientes
            </h3>
            <a href="#" class="btn btn-sm btn-outline-warning">
                <i class="fas fa-list"></i>
            </a>
        </div>

        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    @include('dashboard.tramite.thead')
                    @include('dashboard.tramite.tbody')
                </table>
            </div>
        </div>
    </div>
</div>
