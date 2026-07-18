@props ([
        'color' => 'inherit',
    ])

<div
    {{ $attributes }}
    x-bind:style="`
        /* font-family: 'Courier New', Courier, monospace; */
        font-weight: bold;
        opacity: ${opacity};
        translate: ${transform.tx}px ${transform.ty}px;
        color: {{ $color }};
        rotate: ${transform.rot}deg;
        width: ${size}px;
        height: ${size}px;
        text-align: center;
        `">
    <svg
        x-data="{
            init() {
                console.log('viewBox', viewBox);
                $el.setAttribute('viewBox', viewBox);
            }
        }"
        xmlns="http://w3.org"
        stroke="currentColor"
        fill="none"
        style="color: inherit"
        {{-- x-bind:viewBox="viewBox" --}}
        {{--  viewBox="0 0 170 170" --}}>
        {{-- <filter id="noise">
            <feTurbulence type="turbulence" baseFrequency="0.01" numOctaves="2" result="turbulence" />
            <feDisplacementMap in2="turbulence" in="SourceGraphic" scale="3" xChannelSelector="R"
                yChannelSelector="G" />
        </filter> --}}
        <defs>
            <path x-bind:id="id + '-top'" x-bind:d="topTextPath" />
            <path x-bind:id="id + '-bottom'" x-bind:d="bottomTextPath" />
        </defs>

        {{--  <path stroke="lightblue" stroke-width="1" x-bind:d="bottomTextPath" />
        <path stroke="red" stroke-width="1" x-bind:d="topTextPath" /> --}}
        <g filter="url(#ink-grit-filter)">
            <!-- Outer Thick Stamp Border -->
            <path
                x-show="outerBorder !== 'none'"
                x-bind:d="generateJitteredCircle(outerRadius)"
                x-bind:stroke-width="outerBorder"
                filter="url(#noise)" />

            <!-- Inner Thin Stamp Border -->
            <path
                x-show="innerBorder !== 'none'"
                x-bind:d="generateJitteredCircle(innerRadius)"
                x-bind:stroke-width="innerBorder"
                filter="url(#noise)" />

            <!-- Upper Arched Text (Dynamic Font Scaling) -->
            <text
                x-show="topText"
                fill="currentColor"
                stroke="none"
                x-bind:font-size="topFontSize"
                font-weight="normal"
                {{-- fill="currentColor"
                stroke="currentColor" --}}
                letter-spacing="1">
                <textPath x-bind:href="'#' + id + '-top'" startOffset="50%" text-anchor="middle">
                    <tspan x-text="topText"></tspan>
                </textPath>
            </text>

            <!-- Fixed Lower Arched Text (Right-side up & Scaled) -->
            <text
                x-show="bottomText"
                fill="currentColor"
                stroke="currentColor"
                x-bind:font-size="bottomFontSize"
                font-weight="normal"
                {{-- fill="currentColor"
                stroke="none" --}}
                letter-spacing="1">
                <!-- dy="0.8em" pushes the right-side up text comfortably down into the bottom margin -->
                <textPath x-bind:href="'#' + id + '-bottom'" startOffset="50%" text-anchor="middle">
                    {{-- <tspan dy="5%" x-text="bottomText"></tspan> --}}
                    <tspan dy="-0.3em" x-text="bottomText"></tspan>
                </textPath>
            </text>

            @if (!$slot->hasActualContent())
                <!-- Center Variable Text Line (Dynamic Font Scaling) -->
                <text
                    x-show="centerText"
                    fill="currentColor"
                    stroke="none"
                    x-bind:x="center"
                    x-bind:y="center"
                    x-bind:font-size="centerFontSize"
                    font-weight="bold"
                    text-anchor="middle"
                    dominant-baseline="central">
                    <tspan x-text="centerText"></tspan>
                </text>
            @endif
        </g>

        @if ($slot->hasActualContent())
            <g x-bind:transform="`translate(${iconTranslate})`" x-bind:filter="iconFilterUrl"> {{ $slot }} </g>
            {{--  <g filter="url(#soft-ink-grit-filter)"> {{ $slot }} </g> --}}

        @endif
    </svg>
</div>
