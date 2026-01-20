<div class="form-group">
    <label for="{{ $name }}" class="form-label">{{ $label }}</label>

    <div class="input-group">
        @if ($icon)
            <span class="input-group-text">
                <i class="{{ $icon }}"></i>
            </span>
        @endif

        <input type="{{ $type }}" name="{{ $name }}" id="{{ $name }}"
            class="form-control @error($name) is-invalid @enderror" value="{{ $value }}"
            placeholder="{{ $placeholder }}" @if ($required) required @endif>
    </div>

    @error($name)
        <span class="invalid-feedback d-block">
            {{ $message }}
        </span>
    @enderror
</div>
