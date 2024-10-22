@props([
    'class' => '',
    'options' => [],
    'selected' => [],
    'isInvalid' => false
])

@php
$class .= ($isInvalid ?? false)
            ? ' is-invalid'
            : '';

$selected = (array) $selected;
@endphp

<select {!! $attributes->merge(['class' => $class]) !!}>
    @foreach ($options as $value => $label)
        <option value="{{ $value }}" {{ in_array($value, $selected) ? 'selected' : '' }}>
            {{ $label }}
        </option>
    @endforeach
</select>
