<div class="modal fade" id="contactInfoModal" tabindex="-1">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-address-book me-2"></i>
                    Gestionar contactos
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">
                <div class="d-flex justify-content-end mb-3">
                    <button class="btn btn-sm btn-success" data-bs-toggle="collapse" data-bs-target="#contactForm"
                        aria-expanded="false">
                        <i class="fas fa-plus me-1"></i> Agregar contacto
                    </button>
                </div>

                @include('customer.show.contact.form')

                @include('customer.show.contact.table')
            </div>
        </div>
    </div>
</div>
