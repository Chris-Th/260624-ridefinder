@props ([
    'color' => $attributes->has('color') ? $attributes->get('color') : 'neutral-400',
    'show' => false
])

<div {{ $attributes->merge([ 'class' => "flex size-full origin-center items-center justify-center text-$color" ]) }}>
    @if ($show)
        <x-vectors.stamps.stamp
            class="absolute text-{{ $color }} fill-{{ $color }} aspect-1 p-1"
            x-data="
                stamp({
                    opacity: 1,
                    radius: 20,
                    outerBorder: 2,
                    padding: 0,
                    maxJitter: 0.2,
                    maxTransform: { tx: 4, ty: 3, rot: 30 },
                    iconFilter: 'softer'
                })
            ">
            {{ $slot }}
        </x-vectors.stamps.stamp>
    @endif
</div>
