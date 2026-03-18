@push('modals')
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content border-0">
            <div class="modal-body text-center p-4">

                <div class="mb-3">
                    <span
                        class="d-inline-flex align-items-center justify-content-center rounded-circle bg-danger bg-opacity-10"
                        style="width: 80px; height: 80px;">
                        <x-ui.svg-icon name="trash" />
                    </span>
                </div>

                <h4 class="fw-bold text-danger mb-2">
                    ¿Eliminar registro?
                </h4>

                <p class="mb-1">
                    Esta acción eliminará el registro de forma permanente.
                </p>

                <small class="text-muted">
                    No podrás recuperar la información después.
                </small>
            </div>

            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button"
                        class="btn btn-outline-secondary px-4"
                        data-bs-dismiss="modal">
                    Cancelar
                </button>

                <form id="deleteForm" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger px-4">
                        <i class="dripicons-trash me-1"></i> Eliminar
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('deleteModal');
        const form  = modal.querySelector('#deleteForm');

        modal.addEventListener('show.bs.modal', function (event) {
            form.action = event.relatedTarget.getAttribute('data-action');
        });
    });
</script>
@endpush