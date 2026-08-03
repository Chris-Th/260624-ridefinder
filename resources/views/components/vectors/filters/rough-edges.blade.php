<svg height="0" width="0" x-init="">
    <filter {{ $attributes->filter(fn (string $value, string $key) => $key == 'id' || $key == 'x-bind:id') }}>
        <!-- Generate noise texture -->
        <feTurbulence
            :seed="typeof seed != 'undefined' ? seed : 1"
            type="fractalNoise"
            baseFrequency="0.02"
            numOctaves="1"
            result="noise" />
        <!-- Apply noise to distort the graphic -->
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="7" xChannelSelector="R" yChannelSelector="G" />
    </filter>
</svg>
