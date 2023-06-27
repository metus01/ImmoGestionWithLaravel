@php
    $class ??= null;
    $type ??= 'text';
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
    
@endphp
<div @class(['form-check  form-switch', $class])>
    <label class="form-check-label" for="{{ $name }}">{{ $label }}</label>
    <input @checked($value ??= false) type="hidden" value="0" name="{{ $name }}">
    <input type="checkbox" name="{{ $name }}" id="{{ $name }}" value="1"
        class="form-check-input @error($name) is_invalid @enderror" role="switch">
    <div class="invalid-feedback">
        @error($name)
        {{ $message }}
        @enderror
        
    </div>
</div>
