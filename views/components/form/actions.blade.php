<div class="col-12 d-flex justify-content-end gap-2 mt-4">
    <button type="submit" class="btn btn-primary d-inline-flex align-items-center gap-2">
        <x-ui.svg-icon name="floppy" />
        <span>{{ $submit ?? 'Guardar' }}</span>
    </button>

    <a href="{{ $cancelRoute }}" class="btn btn-outline-secondary d-inline-flex align-items-center gap-2">
        <x-ui.svg-icon name="x" />
        <span>{{ $cancel ?? 'Cancelar' }}</span>
    </a>
</div>