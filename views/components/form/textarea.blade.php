<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    @if ($icon)
        <div class="input-group">
            <span class="input-group-text">
                <x-ui.svg-icon name="{{ $icon }}" />
            </span>

            <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
                class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
        </div>
    @else
        <textarea name="{{ $name }}" id="{{ $name }}" rows="{{ $rows }}"
            class="form-control @error($name) is-invalid @enderror" placeholder="{{ $placeholder }}">{{ $value }}</textarea>
    @endif

    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
