@php
    $type ??= 'text';
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(['form-control', $class])>
    <label for="{{ $name }}">{{ $label }}</label>
    @if ($type === 'textarea')
        <textarea class="form-control  @error($name)
    is-invalid
    @enderror" type="{{ $type }}"
            name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}">{{ old($name, $value) }}</textarea>
    @else
        <input class="form-control  @error($name)
    is-invalid
    @enderror" type="{{ $type }}"
            name="{{ $name }}" id="{{ $name }}" value="{{ old($name, $value) }}">
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>
