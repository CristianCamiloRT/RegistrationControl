@props([
    'required' => false,
    'class' => ''
])

@php
$class .= ($required ?? false)
            ? ' required'
            : '';
@endphp


<label {{ $attributes->merge(['class' => $class]) }}>
    {{ $slot }}
</label>