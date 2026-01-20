document.addEventListener('DOMContentLoaded', function () {

    const searchForm = document.getElementById('searchForm');
    if (!searchForm) return;

    const resultsContainer = document.getElementById('resultsContainer');
    const searchType = searchForm.querySelector('[name="search_type"]');
    const searchValue = searchForm.querySelector('[name="search_value"]');
    const clearBtn = document.getElementById('clearBtn');

    searchType.addEventListener('change', () => {
        searchValue.value = '';
        clearValidationErrors();

        if (searchType.value === 'birthday') {
            searchValue.type = 'date';
            searchValue.placeholder = '';
        } else {
            searchValue.type = 'text';
            searchValue.placeholder = 'Escriba para buscar clientes';
        }
    });

    searchForm.addEventListener('submit', function (event) {
        event.preventDefault();
        clearValidationErrors();

        ['dpi', 'nit', 'full_name', 'birthday'].forEach(name => {
            const el = searchForm.querySelector(`[name="${name}"]`);
            if (el) el.remove();
        });

        const hiddenInput = document.createElement('input');
        hiddenInput.type = 'hidden';
        hiddenInput.name = searchType.value;
        hiddenInput.value = searchValue.value;

        searchForm.appendChild(hiddenInput);

        const actionUrl = searchForm.getAttribute('action');
        const csrfToken = document
            .querySelector('meta[name="csrf-token"]')
            .getAttribute('content');

        const formData = new FormData(searchForm);

        fetch(actionUrl, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': csrfToken,
                'X-Requested-With': 'XMLHttpRequest'
            },
            body: formData
        })
            .then(response => {
                if (!response.ok) throw response;
                return response.json();
            })
            .then(data => {
                resultsContainer.innerHTML = data.html;
            })
            .catch(errorResponse => {
                if (errorResponse.status === 422) {
                    errorResponse.json().then(errorData => {
                        showValidationError(errorData);
                    });
                } else {
                    alert('Ocurrió un error al realizar la búsqueda.');
                }
            });
    });

    clearBtn.addEventListener('click', () => {
        searchValue.value = '';
        resultsContainer.innerHTML = '';
        clearValidationErrors();
    });

    function showValidationError(errorData) {
        searchValue.classList.add('is-invalid');

        const feedback = document.createElement('div');
        feedback.classList.add('invalid-feedback');
        feedback.textContent = Object.values(errorData.errors)[0][0];

        searchValue.parentNode.appendChild(feedback);
    }

    function clearValidationErrors() {
        document.querySelectorAll('.is-invalid')
            .forEach(el => el.classList.remove('is-invalid'));

        document.querySelectorAll('.invalid-feedback')
            .forEach(el => el.remove());
    }

});
