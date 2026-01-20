@if (session('success'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toastEl = document.getElementById('toastSuccess');
            if (toastEl) {
                const toast = new bootstrap.Toast(toastEl);
                toast.show();
            }
        });
    </script>
    <div class="toast-container position-fixed top-0 end-0 p-3" style="z-index: 1100">
        <div id="toastSuccess" class="toast toast-success fade" role="alert" aria-live="assertive" aria-atomic="true"
            data-bs-delay="3000">

            <div class="toast-header">
                <i class="bi bi-check-circle-fill me-2 text-success"></i>
                <strong class="me-auto">Éxito</strong>
                <small>ahora</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>

            <div class="toast-body">
                {{ session('success') }}
            </div>
        </div>
    </div>
@endif
