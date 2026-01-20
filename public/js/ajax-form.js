document.addEventListener('DOMContentLoaded', function () {

    const serviceSelect = document.getElementById('service_type');
    const serviceFormContainer = document.getElementById('serviceFormContainer');
    const customerDpiInput = document.getElementById('customerDpi');
    const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // ---------- CARGA DEL FORMULARIO ----------
    if (serviceSelect && customerDpiInput) {

        serviceSelect.addEventListener('change', function () {

            const selectedService = this.value;

            if (!selectedService) {
                serviceFormContainer.innerHTML = '';
                return;
            }

            const formData = new FormData();
            formData.append('service_type', selectedService);
            formData.append('dpi', customerDpiInput.value);

            fetch(serviceSelect.dataset.url, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': csrfToken,
                    'X-Requested-With': 'XMLHttpRequest'
                },
                body: formData
            })
            .then(res => res.json())
            .then(data => {
                if (data.success && data.html) {
                    serviceFormContainer.innerHTML = data.html;
                }
            })
            .catch(() => alert('Error al cargar el formulario'));
        });
    }

    // ---------- SUBMIT AJAX ----------
    document.addEventListener('submit', function (e) {

        const form = e.target;

        if (!form.classList.contains('ajax-service-form')) {
            return;
        }

        e.preventDefault();
        clearErrors(form);

        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
        .then(async res => {
            const data = await res.json();

            if (!res.ok) {
                showErrors(form, data.errors);
                return;
            }

            if (data.redirect) {
                window.location.href = data.redirect;
            }
        })
        .catch(() => alert('Error al guardar'));
    });

    // ---------- HELPERS ----------
    function showErrors(form, errors) {
        Object.entries(errors).forEach(([field, messages]) => {
            const input = form.querySelector(`[name="${field}"]`);
            if (!input) return;

            input.classList.add('is-invalid');

            const error = document.createElement('div');
            error.className = 'invalid-feedback';
            error.innerText = messages[0];

            input.closest('.col-12, .col-md-6, .col-md-12')?.appendChild(error);
        });
    }

    function clearErrors(form) {
        form.querySelectorAll('.is-invalid').forEach(el => el.classList.remove('is-invalid'));
        form.querySelectorAll('.invalid-feedback').forEach(el => el.remove());
    }
});
