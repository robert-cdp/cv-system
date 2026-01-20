document.addEventListener('DOMContentLoaded', function () {

    const serviceSelect = document.getElementById('service_type');
    const serviceFormContainer = document.getElementById('serviceFormContainer');
    const customerDpiInput = document.getElementById('customerDpi');

    if (!serviceSelect || !customerDpiInput) {
        return;
    }

    const customerDpi = customerDpiInput.value;
    const csrfToken = document
        .querySelector('meta[name="csrf-token"]')
        ?.getAttribute('content');

    serviceSelect.addEventListener('change', function () {

        const selectedService = this.value;

        if (!selectedService) {
            serviceFormContainer.innerHTML = '';
            return;
        }

        const formData = new FormData();
        formData.append('service_type', selectedService);
        formData.append('dpi', customerDpi);

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
        .catch(() => {
            alert('Error al cargar el formulario');
        });

    });

});
