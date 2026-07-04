<div {{ $attributes }} class="stamp-blueprint-rect"
    style="
    display: inline-block;
    mix-blend-mode: multiply;
    transform: rotate(1.8deg);
    opacity: 0.88;
    color: #1a1a1a; /* Classic carbon black or intense industrial ink */
    font-family: 'Courier New', Courier, monospace;
  "
    x-bind:style="'width: ' + viewWidth + 'px; height: ' + viewHeight + 'px;'">
    <svg xmlns="http://w3.org" class="h-full w-full" x-bind:viewBox="viewBox" fill="none" stroke="currentColor">

        <g filter="url(#ink-grit-filter)">
            <!-- Outer Thick Rectangular Border Frame -->
            <path x-bind:d="generateJitteredRect(w, h)" stroke-width="3.5" stroke-linejoin="round" />

            <!-- Inner Thin Rectangular Border Frame (Inset slightly by 6px) -->
            <path x-bind:d="generateJitteredRect(w - 12, h - 12)" stroke-width="1.2" stroke-linejoin="round" />

            <!-- Top Text Line (Positioned neatly under the top margins) -->
            <text x-bind:x="centerX" x-bind:y="padding + (h * 0.28)" x-bind:font-size="fontSize"
                font-weight="bold" fill="currentColor" stroke="none" text-anchor="middle">
                <tspan x-text="upperText"></tspan>
            </text>

            <!-- Center Line / Main Metadata Target (Date, Time, Mileage) -->
            <text x-bind:x="centerX" x-bind:y="centerY" x-bind:font-size="fontSize"
                font-weight="bold" fill="currentColor" stroke="none" text-anchor="middle" dominant-baseline="central">
                <tspan x-text="middleText"></tspan>
            </text>

            <!-- Bottom Text Line (Positioned cleanly right above the bottom margin rules) -->
            <text x-bind:x="centerX" x-bind:y="padding + (h * 0.76)" x-bind:font-size="fontSize"
                font-weight="bold" fill="currentColor" stroke="none" text-anchor="middle">
                <tspan x-text="bottomText"></tspan>
            </text>
        </g>

    </svg>
</div>
