<div>
    <label for="{{ $name }}" class="form-label">
        {{ $label }}
    </label>

    <div class="input-group">
        @if ($icon)
            <span class="input-group-text">
                <x-ui.svg-icon name="{{ $icon }}" />
            </span>
        @endif

        <select name="{{ $name }}" id="{{ $name }}"
            {{ $attributes->merge([
                'class' => 'form-select ' . ($errors->has($name) ? 'is-invalid' : ''),
            ]) }}>
            @if ($placeholder)
                <option disabled selected>{{ $placeholder }}</option>
            @endif

            @foreach ($options as $key => $option)
                @php
                    $optionVal = $optionValue ? $option->{$optionValue} : $key;
                    $optionText = $optionLabel ? $option->{$optionLabel} : $option;
                @endphp

                <option value="{{ $optionVal }}" @selected($optionVal == $value)>
                    {{ $optionText }}
                </option>
            @endforeach
        </select>

        @error($name)
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
</div>
