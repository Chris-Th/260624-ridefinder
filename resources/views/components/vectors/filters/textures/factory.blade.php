@props ([
    'lightingcolor' => '',
    'filterables' => []
])

<svg
    {{ $attributes->merge([
        'style' => 'position:absolute; width:0; height:0; overflow:hidden',
        'aria-hidden' => 'true',
        'focusable' => 'false',
        'preserveAspectRatio' => 'xMidYMid slice',
        'class' => ''
    ]) }}
    xmlns="http://www.w3.org/2000/svg">
    <defs>{{ $slot }}</defs>
</svg>
