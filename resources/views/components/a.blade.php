@props([
    'href' => '#',
    'class' => ''
])

<a {{ $attributes->merge(['class' => $class, 'href' => $href]) }}>
    {{ $slot }}
</a>