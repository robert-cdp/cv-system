@props(['action'])

<button type="button" class="btn btn-outline-danger btn-sm" title="Eliminar" data-bs-toggle="modal" data-bs-target="#deleteModal" data-action="{{ $action }}">
    <x-ui.svg-icon name="trash" />
</button>
