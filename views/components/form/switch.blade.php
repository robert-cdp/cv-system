<div class="form-group">
    <div class="form-check form-switch">
        <input 
            class="form-check-input @error($name) is-invalid @enderror"
            type="checkbox"
            role="switch"
            id="{{ $name }}"
            name="{{ $name }}"
            value="1"
            @checked(old($name, $checked ?? false))
        >

        <label class="form-check-label" for="{{ $name }}">
            {{ $label }}
        </label>
    </div>

    @error($name)
        <span class="invalid-feedback d-block">
            {{ $message }}
        </span>
    @enderror
</div>