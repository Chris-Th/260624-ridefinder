@props ([
    'id' => ''
])

<filter
    id="{{ $id }}"
    filterUnits="objectBoundingBox"
    x="0"
    y="0"
    width="1"
    height="1"
    color-interpolation-filters="sRGB">
    <feTurbulence
        type="fractalNoise"
        baseFrequency="0.0008"
        numOctaves="1"
        seed="{{ rand(1, 999) }}"
        stitchTiles="stitch"
        result="noise" />
    <feColorMatrix
        in="noise"
        type="matrix"
        values="2.55 0 0 0 -0.275  0 2.55 0 0 -0.275  0 0 2.55 0 -0.275  0 0 0 1 0"
        result="colored" />
    <feDiffuseLighting in="colored" lighting-color="white" surfaceScale="7" diffuseConstant="4" result="light">
        <feDistantLight azimuth="{{ rand(0, 359) }}" elevation="2" />
    </feDiffuseLighting>
</filter>
