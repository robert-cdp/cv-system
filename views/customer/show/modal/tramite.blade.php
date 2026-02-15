<div class="modal fade" id="tramiteModal" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">

            {{-- Header --}}
            <div class="modal-header">
                <h5 class="modal-title">
                    <i class="fas fa-file-alt"></i>
                    Detalle del trámite
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <div class="modal-body">

                {{-- Estado --}}
                <div class="callout" id="modalStatusCallout">
                    <h5>
                        <i id="modalStatusIcon"></i>
                        <span id="modalStatus"></span>
                    </h5>
                    <p class="mb-0">
                        Estado actual del trámite.
                    </p>
                </div>

                {{-- Credenciales --}}
                <div class="row mt-3">
                    <div class="col-md-6">
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-user"></i> Usuario
                                </h3>
                            </div>
                            <div class="card-body">
                                <span id="modalEmail" class="fw-bold"></span>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="card card-outline card-secondary">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="fas fa-key"></i> Contraseña
                                </h3>
                            </div>
                            <div class="card-body">
                                <span id="modalPassword" class="fw-bold font-monospace"></span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Comentario --}}
                <div class="card mt-3">
                    <div class="card-header">
                        <h3 class="card-title">
                            <i class="fas fa-comment-dots"></i> Comentario
                        </h3>
                    </div>
                    <div class="card-body">
                        <p id="modalComment" class="mb-0 text-muted"></p>
                    </div>
                </div>

            </div>

            <div class="modal-footer">

                <button class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times"></i> Cerrar
                </button>
            </div>

        </div>
    </div>
</div>
