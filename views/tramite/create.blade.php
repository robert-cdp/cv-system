<div class="card card-outline card-primary fade-in">
    <div class="card-header">
        <h3 class="card-title">
            <i class="fas fa-cogs me-1"></i> {{ $customer->full_name }}
        </h3>
    </div>

    <form method="POST" action="{{ route('tramite.store', $customer->dpi) }}" class="ajax-service-form">
        @csrf

        <div class="card-body">
            <div class="row">
                {{-- Servicio del Cliente --}}
                <div class="col-12 col-md-6">
                    <x-form.select name="service_id" label="Servicio del Cliente" icon="fas fa-folder" :options="$services"
                        option-value="id" option-label="name" placeholder="Seleccionar servicio..." />
                </div>

                {{-- Email --}}
                <div class="col-12 col-md-6">
                    <x-form.input name="email" label="Correo Electrónico o Usuario" icon="fas fa-envelope"/>
                </div>

                {{-- Contraseña --}}
                <div class="col-12 col-md-6">
                    <x-form.input name="password" label="Contraseña" icon="fas fa-lock" type="text" />
                </div>

                {{-- Estado --}}
                <div class="col-12 col-md-6">
                    <x-form.select name="status" label="Estado" icon="fas fa-certificate" :options="[
                        'pendiente' => 'Pendiente',
                        'completo' => 'Completo',
                    ]"
                        placeholder="-- Seleccione --" />
                </div>

                {{-- Campo adicional 1 --}}
                <div class="col-12 col-md-6">
                    <x-form.textarea name="field_additional_1" label="Campo Adicional 1" icon="fas fa-pencil-alt"
                        rows="2" />
                </div>

                {{-- Campo adicional 2 --}}
                <div class="col-12 col-md-6">
                    <x-form.textarea name="field_additional_2" label="Campo Adicional 2" icon="fas fa-pencil-alt"
                        rows="2" />
                </div>

                {{-- Comentario --}}
                <div class="col-12">
                    <x-form.textarea name="comment" label="Comentario" icon="fas fa-comment" rows="5" />
                </div>
            </div>
        </div>

        <div class="card-footer text-end">
            <button type="reset" class="btn btn-outline-secondary">
                <i class="fas fa-undo me-1"></i> Reiniciar
            </button>

            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Guardar Trámite
            </button>
        </div>
    </form>
</div>
