<div class="card card-outline card-primary fade-in">

    <div class="card-header">
        <h3 class="card-title d-flex align-items-center gap-2">
            <x-ui.svg-icon name="person-circle" />
            {{ $customer->full_name }}
        </h3>
    </div>

    <form method="POST" action="{{ route('tramite.store', $customer->dpi) }}">
        @csrf

        <div class="card-body">
            <div class="row g-4">

                {{-- Servicio del Cliente --}}
                <div class="col-12 col-md-6">
                    <x-form.select name="service_id" label="Servicio del Cliente" icon="folder2-open" :options="$services"
                        option-value="id" option-label="name" placeholder="Seleccionar servicio..." />
                </div>

                {{-- Email --}}
                <div class="col-12 col-md-6">
                    <x-form.input name="email" label="Correo Electrónico o Usuario" icon="envelope" />
                </div>

                {{-- Contraseña --}}
                <div class="col-12 col-md-6">
                    <x-form.input name="password" label="Contraseña" icon="key" type="text" />
                </div>

                {{-- Estado --}}
                <div class="col-12 col-md-6">
                    <x-form.select name="status" label="Estado" icon="check-circle" :options="[
                        'pendiente' => 'Pendiente',
                        'completo' => 'Completo',
                    ]"
                        placeholder="-- Seleccione --" />
                </div>

                {{-- Campo adicional 1 --}}
                <div class="col-12 col-md-6">
                    <x-form.textarea name="field_additional_1" label="Campo Adicional 1" icon="pencil"
                        rows="2" />
                </div>

                {{-- Campo adicional 2 --}}
                <div class="col-12 col-md-6">
                    <x-form.textarea name="field_additional_2" label="Campo Adicional 2" icon="pencil"
                        rows="2" />
                </div>

                {{-- Comentario --}}
                <div class="col-12">
                    <x-form.textarea name="comment" label="Comentario" icon="chat-left-text" rows="5" />
                </div>

            </div>
        </div>

        <div class="card-footer d-flex justify-content-end gap-2">

            <button type="reset" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                <x-ui.svg-icon name="arrow-counterclockwise" />
                Reiniciar
            </button>

            <button type="submit" class="btn btn-primary d-flex align-items-center gap-2">
                <x-ui.svg-icon name="save" />
                Guardar Trámite
            </button>

        </div>
    </form>

</div>
