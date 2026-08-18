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
    <!-- 1. Generate high-frequency, sharp grain noise (like gravel/dry paper) -->
    <feTurbulence
        seed="{{ rand(1, 999) }}"
        type="fractalNoise"
        baseFrequency="0.2"
        numOctaves="2"
        result="coarseGrain" />

    <!-- 2. Boost the contrast of the grain to make clear 'ink-void' holes -->
    <feColorMatrix
        type="matrix"
        values="1 0 0 0 0
                        0 1 0 0 0
                        0 0 1 0 0
                        0 0 0 1.8 -0.8"
        result="sharpGrit" />

    <!-- 3. Generate a separate, softer distortion noise for edge bleed -->
    <feTurbulence type="turbulence" baseFrequency="0.06" numOctaves="2" result="distortionNoise" />

    <!-- 4. Warp the edges of the original vector graphics using the soft noise -->
    <feDisplacementMap
        in="SourceGraphic"
        in2="distortionNoise"
        scale="1.2"
        xChannelSelector="R"
        yChannelSelector="G"
        result="warpedVector" />

    <!-- 5. Overlay the sharp grit holes on top of the warped vector graphics -->
    <feComposite in="warpedVector" in2="sharpGrit" operator="out" />
</filter>

<filter id="soft-ink-grit-filter"> </filter>
