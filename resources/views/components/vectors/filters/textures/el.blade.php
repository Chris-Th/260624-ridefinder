@props ([
    'id' => '',
    'opacity' => 0.1
])

<svg
    {{ $attributes->merge(['class' => 'h-full w-full']) }}
    style="--filter-id: url(#{{ $id }});"
    aria-hidden="true"
    focusable="false"
    preserveAspectRatio="xMidYMid slice">
    <rect width="100%" height="100%" filter="var(--filter-id)" opacity="{{ $opacity }}" style="pointer-events: none" />
</svg>
