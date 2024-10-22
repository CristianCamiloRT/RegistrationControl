@props([
    'type' => 'text',
    'class' => '',
    'placeholder' => '',
    'required' => false,
    'isInvalid' => false,
    'value' => '',
    'name' => ''
])

@php
$class .= ($isInvalid ?? false)
            ? ' is-invalid'
            : '';
@endphp

<input  {{ $attributes->merge(['type' => $type, 'class' => $class, 'placeholder' => $placeholder, 'required' => $required, 'value' => $value, 'name' => $name]) }}>