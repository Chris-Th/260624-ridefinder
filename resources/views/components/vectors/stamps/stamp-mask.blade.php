@props ([
        'color' => 'inherit',
        'opacity' => 1
    ])

<div
    {{ $attributes->merge([ 'class' => 'ibm-plex-mono' ]) }}
    x-bind:style="`
        font-family: 'Courier New', Courier, monospace;
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
                gradientStopRanges = [
                    [0, 1],
                    [40, 0.6],
                    [80, 0.2],
                    [100, 0]
                ];
                stops = generateStopAttrValues(gradientStopRanges);
            }
        }"
        opacity="{{ $opacity }}"
        xmlns="http://w3.org"
        stroke="currentColor"
        style="color: inherit; mix-blend-mode: multiply"
        class="z-10"
        fill="none">
        <defs>
            <path x-bind:id="id + '-top'" x-bind:d="topTextPath" />
            <path x-bind:id="id + '-bottom'" x-bind:d="bottomTextPath" />

            <linearGradient
                x-init="$el.setAttribute('gradientTransform', `rotate(${Math.random() * 360})`)"
                x-bind:id="'uneven-stamp-pressure-' + id"
                x1="0%"
                y1="0%"
                x2="100%"
                y2="0%"
                gradientUnits="userSpaceOnUse">
                <stop stop-color="currentColor" :stop-opacity="`${stops[0].opacity}`" :offset="`${stops[0].offset}%`" />
                <stop stop-color="currentColor" :stop-opacity="`${stops[1].opacity}`" :offset="`${stops[1].offset}%`" />
                <stop stop-color="currentColor" :stop-opacity="`${stops[2].opacity}`" :offset="`${stops[2].offset}%`" />
                <stop stop-color="currentColor" :stop-opacity="`${stops[3].opacity}`" :offset="`${stops[3].offset}%`" />
            </linearGradient>

            <g x-bind:id="'stamp-text-and-borders-' + id" x-bind:stroke="'url(#uneven-stamp-pressure-' + id + ')'">
                <!-- Outer Thick Stamp Border -->
                <path
                    x-show="outerBorder !== 'none'"
                    x-bind:d="generateJitteredCircle(outerRadius)"
                    x-bind:stroke-width="outerBorder" />

                <!-- Inner Thin Stamp Border -->
                <path
                    x-show="innerBorder !== 'none'"
                    x-bind:d="generateJitteredCircle(innerRadius)"
                    x-bind:stroke-width="innerBorder"
                    filter="url(#noise)" />

                <!-- Upper Arched Text (Dynamic Font Scaling) -->
                <text
                    x-show="topText"
                    x-bind:fill="'url(#uneven-stamp-pressure-' + id + ')'"
                    {{-- fill="currentColor" --}}
                    stroke="none"
                    x-bind:font-size="topFontSize"
                    x-bind:font-weight="fontWeight.top"
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
                    x-bind:fill="'url(#uneven-stamp-pressure-' + id + ')'"
                    x-bind:stroke="'url(#uneven-stamp-pressure-' + id + ')'"
                    x-bind:font-size="bottomFontSize"
                    x-bind:font-weight="fontWeight.bottom"
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
                        x-bind:fill="'url(#uneven-stamp-pressure-' + id + ')'"
                        stroke="none"
                        x-bind:x="center"
                        x-bind:y="center"
                        x-bind:font-size="centerFontSize"
                        x-bind:font-weight="fontWeight.center"
                        text-anchor="middle"
                        dominant-baseline="central">
                        <tspan x-text="centerText"></tspan>
                    </text>
                @endif
            </g>

            @if ($slot->hasActualContent())
                <g
                    x-bind:id="'stamp-motive-' + id"
                    x-bind:fill="'url(#uneven-stamp-pressure-' + id + ')'"
                    x-bind:stroke="'url(#uneven-stamp-pressure-' + id + ')'"
                    x-bind:transform="`translate(${iconTranslate})`">
                    {{ $slot }}
                </g>
                {{--  <g filter="url(#soft-ink-grit-filter)"> {{ $slot }} </g> --}}

            @endif
        </defs>

        <g
            x-data="{
                factorX: Math.random(),
                factorY: Math.random(),
                factorOpac: Math.random()
            }"
            x-bind:stroke="'url(#uneven-stamp-pressure-' + id + ')'"
            x-bind:id="'stamp-' + id">
            <g filter="url(#ink-grit-filter)">
                <use
                    x-bind:opacity="factorOpac * 0.15"
                    x-bind:transform="`translate(${4 * factorX}, ${4 * factorY})`"
                    x-bind:href="'#stamp-text-and-borders-' + id" />
                <use
                    x-bind:opacity="factorOpac * 0.3"
                    x-bind:transform="`translate(${3 * factorX}, ${3 * factorY})`"
                    x-bind:href="'#stamp-text-and-borders-' + id" />
                <use
                    x-bind:opacity="factorOpac * 0.6"
                    x-bind:transform="`translate(${2 * factorX}, ${2 * factorY})`"
                    x-bind:href="'#stamp-text-and-borders-' + id" />
            </g>

            <use opacity="0.6" filter="url(#softer-ink-grit-filter)" x-bind:href="'#stamp-text-and-borders-' + id" />

            <g filter="url(#ink-grit-filter)">
                <use
                    x-bind:opacity="factorOpac * 0.2"
                    x-bind:transform="`translate(${2.5 * factorX}, ${2.5 * factorY})`"
                    x-bind:href="'#stamp-motive-' + id" />
                <use
                    x-bind:opacity="factorOpac * 0.4"
                    x-bind:transform="`translate(${1.5 * factorX}, ${1.5 * factorY})`"
                    x-bind:href="'#stamp-motive-' + id" />
            </g>
            <use opacity="0.7" x-bind:filter="iconFilterUrl" x-bind:href="'#stamp-motive-' + id" />
        </g>
    </svg>
</div>
