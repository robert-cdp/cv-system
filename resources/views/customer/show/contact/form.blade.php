<div class="collapse" id="contactForm">
    <div class="card mb-3">
        <div class="card-body">

            <h6 class="mb-3">
                <i class="fas fa-plus-circle me-1"></i>
                Agregar contacto
            </h6>
            <form action="{{ route('customer.createContact', $customer->dpi) }}" method="post" class="ajax-service-form">
                @csrf

                <div class="row g-2">
                    <div class="col-md-4">
                        <label class="form-label">Tipo</label>
                        <select name="type" class="form-select form-select-sm">
                            <option value="email">Email</option>
                            <option value="cellphone">Celular</option>
                            <option value="whatsapp">WhatsApp</option>
                            <option value="phone">Teléfono</option>
                            <option value="other">Otro</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label">Valor</label>
                        <input type="text" name="value" class="form-control form-control-sm">
                    </div>

                    <div class="col-md-2 d-flex align-items-end">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="is_primary" value="1">
                            <label class="form-check-label">Principal</label>
                        </div>
                    </div>
                </div>

                <div class="text-end mt-3">
                    <button type="button" class="btn btn-sm btn-secondary" data-bs-toggle="collapse"
                        data-bs-target="#contactForm">
                        Cancelar
                    </button>

                    <button type="submit" class="btn btn-sm btn-primary">
                        <i class="fas fa-save me-1"></i> Guardar
                    </button>
                </div>
            </form>

        </div>
    </div>
</div>
