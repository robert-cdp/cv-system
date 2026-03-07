@if ($service->tramite)
    <div class="border rounded p-3 mb-3 d-flex justify-content-between align-items-center shadow-sm bg-white">
        <div class="d-flex align-items-center gap-3">

            <x-ui.svg-icon 
                :name="$service->tramite->status === 'completo' ? 'check-circle-fill' : 'clock-fill'"
                :class="$service->tramite->status === 'completo' ? 'text-success fs-3' : 'text-warning fs-3'"
            />

            <div>
                <div class="fw-semibold fs-6">
                    {{ $service->service->name ?? 'Servicio' }}
                </div>

                <div class="small {{ $service->tramite->status === 'completo' ? 'text-success' : 'text-warning' }}">
                    {{ $service->tramite->status === 'completo' ? 'Completo' : 'Pendiente' }}
                </div>

                <div class="text-muted small d-flex align-items-center gap-1">
                    <x-ui.svg-icon name="calendar-event" />
                    {{ $service->tramite->created_at->format('d/m/Y') }}
                </div>
            </div>
        </div>

        <div class="d-flex gap-2">
            <a href="{{ route('tramite.edit', $service->tramite->id) }}" class="btn btn-sm btn-outline-secondary">
                <x-ui.svg-icon name="pencil" class="me-1" />
                Editar
            </a>

            <button 
                class="btn btn-sm btn-outline-primary btn-view-tramite"
                data-email="{{ $service->tramite->email_decrypted }}"
                data-password="{{ $service->tramite->password_decrypted }}"
                data-status="{{ ucfirst($service->tramite->status) }}"
                data-comment="{{ $service->tramite->comment }}"
            >
                <x-ui.svg-icon name="eye" class="me-1" />
                Ver datos
            </button>
        </div>
    </div>
@endif