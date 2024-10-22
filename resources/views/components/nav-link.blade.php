@props([
    'href' => '#',
    'class' => '',
    'icon' => ''
])

<a {{ $attributes->merge(['class' => $class, 'href' => $href]) }}>
    <span class="nav-link-icon d-md-none d-lg-inline-block">
        <i class="{{ $icon }}"></i>
    </span>
    <span class="nav-link-title">
        {{ $slot }}
    </span>
</a>
