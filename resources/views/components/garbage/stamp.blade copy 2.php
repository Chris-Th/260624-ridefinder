<!-- Wrapper Div: Controls overall stamp position, sizing constraints, and rotation -->
<div
  {{ $attributes }}
  class="stamp-blueprint"
  style="
    width: 200px;
    height: 200px;
    display: inline-block;
    mix-blend-mode: multiply;
    transform: rotate(-2.5deg);
    opacity: 0.85;
    color: #4b1fa3;
    font-family: 'Courier New', Courier, monospace;
  "
>
  <svg
    xmlns="http://w3.org"
    class="w-full h-full"
    x-bind:viewBox="viewBox"
    fill="none"
    stroke="currentColor"
  >
    <defs>
      <!-- Mathematical structural tracks for curved text alignment -->
      <path id="top-track" x-bind:d="topTextPath" />
      <path id="bottom-track" x-bind:d="bottomTextPath" />
    </defs>

    <!-- Outer Thick Stamp Border -->
    <path
      x-bind:d="generateJitteredCircle(outerRadius)"
      stroke-width="3.5"
    />

    <!-- Inner Thin Stamp Border -->
    <path
      x-bind:d="generateJitteredCircle(innerRadius)"
      stroke-width="1.2"
    />

    <!-- Upper Arched Text (Anchored exactly at 50% midpoint of the top arc) -->
    <text font-size="11" font-weight="bold" fill="currentColor" stroke="none" letter-spacing="1">
      <textPath href="#top-track" startOffset="50%" text-anchor="middle">
        <tspan x-text="upperText"></tspan>
      </textPath>
    </text>

    <!-- Lower Arched Text (Anchored exactly at 50% midpoint of the bottom flipped arc) -->
    <text font-size="11" font-weight="bold" fill="currentColor" stroke="none" letter-spacing="1">
      <textPath href="#bottom-track" startOffset="50%" text-anchor="middle">
        <tspan x-text="bottomText"></tspan>
      </textPath>
    </text>

    <!-- Center Variable Text Line (Raw mechanical time and date block) -->
    <text
      x-bind:x="center"
      x-bind:y="center"
      font-size="12"
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
