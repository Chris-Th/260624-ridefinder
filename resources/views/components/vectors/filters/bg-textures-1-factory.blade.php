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
    <defs>
        @foreach ($filterables as $el)
            <filter
                id="bg-texture-1-{{ $el->id }}"
                filterUnits="objectBoundingBox"
                x="0"
                y="0"
                width="1"
                height="1"
                color-interpolation-filters="sRGB">
                <feTurbulence
                    type="fractalNoise"
                    baseFrequency="0.004"
                    numOctaves="1"
                    seed="{{ rand(1, 999) }}"
                    stitchTiles="stitch"
                    result="noise" />
                <feColorMatrix
                    in="noise"
                    type="matrix"
                    values="2.55 0 0 0 -0.275  0 2.55 0 0 -0.275  0 0 2.55 0 -0.275  0 0 0 1 0"
                    result="colored" />
                <feDiffuseLighting
                    in="colored"
                    lighting-color="white"
                    surfaceScale="2"
                    diffuseConstant="4"
                    result="light">
                    <feDistantLight azimuth="{{ rand(0, 359) }}" elevation="2" />
                </feDiffuseLighting>
            </filter>
        @endforeach
    </defs>
</svg>
