@props ([
    'id' => '',
    'seed' => rand(1, 999)
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
        baseFrequency="0.0000001"
        numOctaves="2"
        seed="{{ $seed }}"
        stitchTiles="stitch"
        result="noise" />
    <feColorMatrix
        in="noise"
        type="matrix"
        values="2.55 0 0 0 -0.275  0 2.55 0 0 -0.275  0 0 2.55 0 -0.275  0 0 0 1 0"
        result="colored" />
    <feDiffuseLighting
        in="colored"
        lighting-color="#9CC6EC"
        surfaceScale="4"
        diffuseConstant="2"
        result="light">
        <feDistantLight
            azimuth="{{ rand(-10, 10) }}"
            elevation="2.5" />
    </feDiffuseLighting>
</filter>
