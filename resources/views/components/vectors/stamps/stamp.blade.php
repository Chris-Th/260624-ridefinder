<div
  {{ $attributes }}
  class="stamp-blueprint"
  style="
    display: inline-block;
    mix-blend-mode: multiply;
    transform: rotate(-2.5deg);
    opacity: 0.85;
    color: #4b1fa3;
    font-family: 'Courier New', Courier, monospace;
  "
  x-bind:style="'width: ' + size + 'px; height: ' + size + 'px;'"
>
  <svg
    xmlns="http://w3.org"
    class="w-full h-full"
    x-bind:viewBox="viewBox"
    fill="none"
    stroke="currentColor"
  >
     <filter id="noise">
        <feTurbulence
            type="turbulence"
            baseFrequency="0.01"
            numOctaves="2"
            result="turbulence"
        />
         <feDisplacementMap
            in2="turbulence"
            in="SourceGraphic"
            scale="3"
            xChannelSelector="R"
            yChannelSelector="G" />
    </filter>
    <defs>
      <path x-bind:id="id + '-top'" x-bind:d="topTextPath" />
      <path x-bind:id="id + '-bottom'" x-bind:d="bottomTextPath" />
    </defs>

    <!-- Outer Thick Stamp Border -->
    <path
      x-bind:d="generateJitteredCircle(outerRadius)"
      stroke-width="3.5"
      filter="url(#noise)"
    />

    <!-- Inner Thin Stamp Border -->
    <path
      x-bind:d="generateJitteredCircle(innerRadius)"
      stroke-width="1.2"
      filter="url(#noise)"
    />

    <!-- Upper Arched Text (Dynamic Font Scaling) -->
    <text x-bind:font-size="borderFontSize" font-weight="bold" fill="currentColor" stroke="none" letter-spacing="1">
      <textPath x-bind:href="'#' + id + '-top'" startOffset="50%" text-anchor="middle">
        <tspan x-text="upperText"></tspan>
      </textPath>
    </text>

    <!-- Fixed Lower Arched Text (Right-side up & Scaled) -->
    <text x-bind:font-size="borderFontSize" font-weight="bold" fill="currentColor" stroke="none" letter-spacing="1">
      <!-- dy="0.8em" pushes the right-side up text comfortably down into the bottom margin -->
      <textPath x-bind:href="'#' + id + '-bottom'" startOffset="50%" text-anchor="middle" dy="0.8em">
        <tspan x-text="bottomText"></tspan>
      </textPath>
    </text>

    <!-- Center Variable Text Line (Dynamic Font Scaling) -->
    <text
      x-bind:x="center"
      x-bind:y="center"
      x-bind:font-size="centerFontSize"
      font-weight="bold"
      fill="currentColor"
      stroke="none"
      text-anchor="middle"
      dominant-baseline="central"
    >
      <tspan x-text="middleText"></tspan>
    </text>

  </svg>
</div>
