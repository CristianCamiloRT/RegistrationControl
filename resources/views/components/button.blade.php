@props([
    'class' => '',
    'type' => 'submit'    
])

<button {{ $attributes->merge(['class' => $class, 'type' => $type]) }}>
    {{ $slot }}
</button>