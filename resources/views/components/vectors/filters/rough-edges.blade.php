<svg height="0" width="0" x-init="">
    <filter {{ $attributes->filter(fn (string $value, string $key) => $key == 'id' || $key == 'x-bind:id') }}>
        <!-- Generate noise texture -->
        <feTurbulence
            :seed="typeof seed != 'undefined' ? seed : 1"
            type="fractalNoise"
            baseFrequency="0.01"
            numOctaves="5"
            result="noise" />
        <!-- Apply noise to distort the graphic -->
        <feDisplacementMap in="SourceGraphic" in2="noise" scale="10" xChannelSelector="R" yChannelSelector="G" />
    </filter>
</svg>
