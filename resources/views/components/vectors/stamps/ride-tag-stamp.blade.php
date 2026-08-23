@props ([
    'color' => $attributes->has('color') ? $attributes->get('color') : 'neutral-400',
    'show' => false,
    'radius' => 20,
    'maxTransformX' => 4,
    'maxTransformY' => 3,
    'maxRotation' => 30
])

<div
    style="color: {{ $color }};"
    {{ $attributes->merge([ 'class' => "flex size-full origin-center items-center justify-center text-$color" ]) }}>
    @if ($show)
        <x-vectors.stamps.round-stamp
            class="absolute text-{{ $color }} fill-{{ $color }} aspect-1 p-1"
            x-data="
                stamp({
                    opacity: 1,
                    radius: {{ $radius }},
                    outerBorder: 1,
                    padding: 0,
                    maxJitter: 0.2,
                    pressureFaint: 1.3,
                    maxTransform: { tx: {{ $maxTransformX }}, ty: {{ $maxTransformY }}, rot: {{ $maxRotation }} },
                    iconFilter: 'softer'
                })
            ">
            {{ $slot }}
        </x-vectors.stamps.round-stamp>
    @endif
</div>
