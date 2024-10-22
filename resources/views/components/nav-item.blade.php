@props([
    'active',
    'dropdown'
])

@php
$classes = ($active ?? false)
            ? 'nav-item active'
            : 'nav-item';

$classes .= ($dropdown ?? false)
            ? ' dropdown'
            : '';

@endphp

<li {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</li>
