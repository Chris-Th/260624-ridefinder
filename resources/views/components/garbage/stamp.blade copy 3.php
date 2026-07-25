@props ([
        'color' => '',
        /* 'ridetype' => $attributes->has('ridetype') ? $attributes->get('ridetype') : '', */
        'ridetype' => 'default'
    ])
@php
        dump($color);
    @endphp

<div
    {{ $attributes }}
    class="text-{{ $ridetype }}-500"
    {{-- style="
    /* display: inline-block;
    mix-blend-mode: multiply;
    transform: rotate(-2.5deg);
    opacity: 0.85;
    color: #4b1fa3; */
    font-family: 'Courier New', Courier, monospace;
  " --}}
    {{-- x-bind:style="`color: {{ $color }}; font-weight: bold; translate: ${transform.tx}px ${transform.ty}px; rotate: ${transform.rot}deg; width: size + 'px'; height: size + 'px';`" --}}
    {{-- x-bind:style="`
        /* font-family: 'Courier New', Courier, monospace; */
        font-weight: bold;
        /* opacity: 0.5; */
        translate: ${transform.tx}px ${transform.ty}px;
        /* color: hsl({{ $color }}); */
        rotate: ${transform.rot}deg;
        width: size + 'px';
        height: size + 'px';
        `" --}}
    style="color: {{ $color }}"
    {{-- x-bind:style="{
        width: size + 'px',
        height: size + 'px',
        transform: translate(transform.tx + 'px ' + transform.ty + 'px') rotate(transform.rot + 'deg'),
        /* rotate: transform.rot + 'deg', */
        color: `hsl({{ $color }})`,
        fill: `hsl({{ $color }})`
        stroke: `hsl({{ $color }})`
    }" --}}>
    <svg
        xmlns="http://w3.org"
        stroke="currentColor"
        fill="none"
        style="color: inherit"
        class="h-full w-full"
        x-bind:viewBox="viewBox">
        {{-- <filter id="noise">
            <feTurbulence type="turbulence" baseFrequency="0.01" numOctaves="2" result="turbulence" />
            <feDisplacementMap in2="turbulence" in="SourceGraphic" scale="3" xChannelSelector="R"
                yChannelSelector="G" />
        </filter> --}}
        <defs>
            <path x-bind:id="id + '-top'" x-bind:d="topTextPath" />
            <path x-bind:id="id + '-bottom'" x-bind:d="bottomTextPath" />
        </defs>

        <g filter="url(#ink-grit-filter)">
            <!-- Outer Thick Stamp Border -->
            <path x-bind:d="generateJitteredCircle(outerRadius)" stroke-width="4.5" filter="url(#noise)" />

            <!-- Inner Thin Stamp Border -->
            <path x-bind:d="generateJitteredCircle(innerRadius)" stroke-width="1.5" filter="url(#noise)" />

            <!-- Upper Arched Text (Dynamic Font Scaling) -->
            <text
                fill="currentColor"
                stroke="none"
                x-bind:font-size="borderFontSize"
                font-weight="normal"
                {{-- fill="currentColor"
                stroke="currentColor" --}}
                letter-spacing="1">
                <textPath x-bind:href="'#' + id + '-top'" startOffset="50%" text-anchor="middle">
                    <tspan x-text="upperText"></tspan>
                </textPath>
            </text>

            <!-- Fixed Lower Arched Text (Right-side up & Scaled) -->
            <text
                fill="currentColor"
                stroke="none"
                x-bind:font-size="borderFontSize"
                font-weight="bold"
                {{-- fill="currentColor"
                stroke="none" --}}
                letter-spacing="1">
                <!-- dy="0.8em" pushes the right-side up text comfortably down into the bottom margin -->
                <textPath x-bind:href="'#' + id + '-bottom'" startOffset="50%" text-anchor="middle" dy="0.8em">
                    <tspan dy="5%" x-text="bottomText"></tspan>
                </textPath>
            </text>

            @if (!$slot->hasActualContent())
                <!-- Center Variable Text Line (Dynamic Font Scaling) -->
                <text
                    fill="currentColor"
                    stroke="none"
                    x-bind:x="center"
                    x-bind:y="center"
                    x-bind:font-size="centerFontSize"
                    font-weight="bold"
                    {{-- fill="currentColor"
                    stroke="none" --}}
                    text-anchor="middle"
                    dominant-baseline="central">
                    <tspan x-text="middleText"></tspan>
                </text>
            @endif
        </g>

        @if ($slot->hasActualContent())
            <g filter="url(#soft-ink-grit-filter)"> {{ $slot }} </g>

        @endif
    </svg>
</div>
