<!-- Place this single hidden definition SVG anywhere in your HTML master layout -->
<svg xmlns="http://w3.org" style="position: absolute; width: 0; height: 0; overflow: hidden;" aria-hidden="true">
  <defs>
    <!-- The Gritty Ink Fade Texture Definition -->
    <filter id="ink-grit-filter">
      <!-- 1. Generate high-frequency, sharp grain noise (like gravel/dry paper) -->
      <feTurbulence type="fractalNoise" baseFrequency="0.45" numOctaves="3" result="coarseGrain" />

      <!-- 2. Boost the contrast of the grain to make clear 'ink-void' holes -->
      <feColorMatrix type="matrix" values="1 0 0 0 0
                                           0 1 0 0 0
                                           0 0 1 0 0
                                           0 0 0 1.8 -0.8" result="sharpGrit" />
    {{--
    change each color, alpha and offset
    [ R ] : [ r  g  b  a  o ]   0 1 0 0 0 changes red to green
    [ G ] : [ r  g  b  a  o ]
    [ B ] : [ r  g  b  a  o ]
    [ A ] : [ a  a  a  a  o ]
    --}}

      <!-- 3. Generate a separate, softer distortion noise for edge bleed -->
      <feTurbulence type="turbulence" baseFrequency="0.06" numOctaves="2" result="distortionNoise" />

      <!-- 4. Warp the edges of the original vector graphics using the soft noise -->
      <feDisplacementMap in="SourceGraphic" in2="distortionNoise" scale="2.2" xChannelSelector="R" yChannelSelector="G" result="warpedVector" />

      <!-- 5. Overlay the sharp grit holes on top of the warped vector graphics -->
      <feComposite in="warpedVector" in2="sharpGrit" operator="out" />
    </filter>


     <!-- The Gritty Ink Fade Texture Definition -->
    <filter id="soft-ink-grit-filter">
      <!-- 1. Generate high-frequency, sharp grain noise (like gravel/dry paper) -->
      <feTurbulence type="fractalNoise" baseFrequency="0.04" numOctaves="2" result="coarseGrain" />

      <!-- 2. Boost the contrast of the grain to make clear 'ink-void' holes -->
      <feColorMatrix type="matrix" values="1 0 0 0 0
                                           0 1 0 0 0
                                           0 0 1 0 0
                                           0 0 0 1.8 -0.8" result="sharpGrit" />
    {{--
    change each color, alpha and offset
    [ R ] : [ r  g  b  a  o ]   0 1 0 0 0 changes red to green
    [ G ] : [ r  g  b  a  o ]
    [ B ] : [ r  g  b  a  o ]
    [ A ] : [ a  a  a  a  o ]
    --}}

      <!-- 3. Generate a separate, softer distortion noise for edge bleed -->
      <feTurbulence type="turbulence" baseFrequency="0.2" numOctaves="1" result="distortionNoise" />

      <!-- 4. Warp the edges of the original vector graphics using the soft noise -->
      <feDisplacementMap in="SourceGraphic" in2="distortionNoise" scale="2" xChannelSelector="R" yChannelSelector="G" result="warpedVector" />

      <!-- 5. Overlay the sharp grit holes on top of the warped vector graphics -->
      <feComposite in="warpedVector" in2="sharpGrit" operator="out" />
    </filter>
  </defs>
</svg>
