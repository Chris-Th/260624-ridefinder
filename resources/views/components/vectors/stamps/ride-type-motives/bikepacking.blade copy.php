@props([ 'uniqueId' => $attributes->has('uniqueId') ? $attributes->get('uniqueId') : '' ])

<svg {{ $attributes }} xmlns="http://www.w3.org/2000/svg" viewBox="0 0 190 148">
    <defs>
    <clipPath id="handle-cutout-{{ $uniqueId }}" clip-rule="evenodd">
      <!-- 100% now works flawlessly since the canvas starts at 0 0 -->
      <rect width="100%" height="100%" />

      <!-- NW-quadrant-cutout (Shifted) -->
      <path d="M82 31h2c1 5 -7 47 -9 55l-52 9c4 -26 16 -49 42 -59z"/>
    </clipPath>
  </defs>
    <g style="pointer-events:none">
        {{-- Tent and bag --}}
        <g>
            <path fill="#417592"
                d="M83 0c5 2 16 22 20 28l35 56c-2 11 -7 5 -11 11 -6 8 -6 39 -6 48h-64l5 -13q6 1 10 -1v-2q-4 -3 -9 -3l15 -97 1 -11 -17 33q-24 45 -45 91h-5c-7 -2 -6 -10 -12 -16q39 -56 76 -114z" />
            <path fill="#417592"
                d="M142 85q3 -6 9 -5c5 0 17 -2 20 2 5 6 -3 9 6 14l2 1c13 -2 12 15 7 21v1c7 9 7 33 -8 28 -7 -8 3 -21 -3 -27 -4 0 -2 0 -5 2 -7 3 -24 5 -28 -4l-1 -1 -3 4 -2 -1 -9 -2c0 -10 -2 -19 9 -23h4q2 -3 2 -10" />
            <path fill="#417592"
                d="M70 44c4 5 -13 82 -15 92l-27 1 -1 -1c0 -6 38 -82 43 -93m102 82c4 13 1 25 -15 23q-8 0 -14 -2v-20c12 3 18 4 29 -1m-45 -7 9 2 -5 1 8 4 1 22q-9 3 -13 -4 -3 -8 -2 -17 0 -5 2 -8" />
        </g>

        <path fill="#cbd1d2" d="M94 26c3 6 16 28 16 33l-3 3 -4 -1c-2 -2 -1 -1 -1 -5l3 -4q-7 -13 -11 -26" />
        <path fill="#cbd1d2" d="M111 74q4 3 6 8 -4 -2 -6 -8" />
        <path fill="#cbd1d2" d="M137 97c4 4 1 3 4 6v10c-2 -1 -4 -13 -4 -16" />
        <path fill="#e8e5e4" d="m119 79 2 1 -2 1h-1z" />
        <path fill="#e8e5e4" d="m177 96 2 1c-1 4 -1 13 -3 16l-1 -1q-1 -8 2 -16" />
        <path fill="#e8e5e4" d="M186 119q-2 5 -6 3v-1c3 -3 2 -2 6 -3z" />

        {{-- Handle cutout --}}
        <path fill="#f7f6f2" d="M150 84q10 0 17 2v8c-6 0 -17 3 -20 -3z" />
        <path fill="#e8e5e4" d="m127 118 9 2 -5 1q-6 -1 -6 5 0 -5 2 -8" />

        <path fill="#4c7e9a" d="M105 52c2 2 3 7 5 7l-3 3 -4 -1c-2 -2 -1 -1 -1 -5z" />
        <path fill="#588096" d="M18 112c1 4 -3 10 -4 13h-1l-1 -2c2 -6 1 -8 6 -11" />
        <path fill="#6b8ea1" d="M107 127h4l-1 1 -2 1z" />
        <path fill="#4c7e9a" d="M142 85c2 9 1 9 -1 18 -3 -3 0 -2 -4 -6l-1 -2h4q2 -3 2 -10" />


    </g>
</svg>
