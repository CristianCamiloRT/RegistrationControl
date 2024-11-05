@props([
    'name' => '',
    'rows' => '1',
    'class' => '',
    'placeholder' => '',
    'required' => false,
    'isInvalid' => false
])

@php
$class .= ($isInvalid ?? false)
            ? ' is-invalid'
            : '';
@endphp
<textarea {{ $attributes->merge(['name' => $name, 'rows' => $rows, 'class' => $class, 'placeholder' => $placeholder, 'required' => $required]) }}>{{ $slot }}</textarea>