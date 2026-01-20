<div class="col-lg-6">
    <div class="card card-outline card-success shadow-sm mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3 class="card-title fw-semibold">
                <i class="fas fa-user-plus me-2"></i>Últimos Clientes Registrados
            </h3>
        </div>
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    @include('dashboard.customer.thead')
                    @include('dashboard.customer.tbody')
                </table>
            </div>
        </div>
    </div>
</div>
