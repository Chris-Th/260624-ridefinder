@props ([
    'color' => '',
    'ridetype' => '',
    'uniqueid' => '',
    'iconPath' => ''
])

<x-vectors.stamps.round-stamp
    color="{{ $color }}"
    ridetype="{{ $ridetype }}"
    opacity="0.8"
    class="w-20"
    x-data="
        stamp({
            opacity: 1,
            radius: 20,
            innerBorder: 0,
            outerBorder: 1,
            padding: 2,
            maxJitter: 0.5,
            smearFactor: 0,
            centerText: '',
            maxTransform: { tx: 0, ty: 0, rot: 0 },
            iconFilter: 'soft'
        })
    ">
    <x-dynamic-component
        uniqueid="{{ $uniqueid }}"
        component="{{ $iconPath }}"
        x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]  origin-center`"
        x-bind:x="iconRect.x"
        x-bind:y="iconRect.y"
        x-bind:width="iconRect.width"
        x-bind:height="iconRect.height"
        class="" />
</x-vectors.stamps.round-stamp>
