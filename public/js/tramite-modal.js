document.addEventListener('DOMContentLoaded', () => {

    const modalElement = document.getElementById('tramiteModal');
    if (!modalElement) return;

    const modal = new bootstrap.Modal(modalElement);

    document.querySelectorAll('.btn-view-tramite').forEach(button => {
        button.addEventListener('click', () => {

            document.getElementById('modalEmail').textContent =
                button.dataset.email || '—';

            document.getElementById('modalPassword').textContent =
                button.dataset.password || '—';

            document.getElementById('modalComment').textContent =
                button.dataset.comment || 'Sin comentarios';

            const status = (button.dataset.status || '').toLowerCase();

            const callout = document.getElementById('modalStatusCallout');
            const statusIcon = document.getElementById('modalStatusIcon');
            const statusText = document.getElementById('modalStatus');

            if (status === 'completo') {
                callout.className = 'callout callout-success';
                statusIcon.className = 'fas fa-check-circle';
                statusText.textContent = 'Trámite completado';
            } else {
                callout.className = 'callout callout-warning';
                statusIcon.className = 'fas fa-clock';
                statusText.textContent = 'Trámite pendiente';
            }

            modal.show();
        });
    });
});
