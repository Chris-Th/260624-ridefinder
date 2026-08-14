@props ([
    'rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '',
    'rowHeight' => '20px',
    'colWidth' => 'minmax(20px, 1fr)',
    'rows' => 12,
    'cols' => 12,
    'wallThickness' => '16px'
])

@php
    $colsContent = $cols - 2;
@endphp

<div {{ $attributes->merge(['class' => 'ridecard relative border-mist-700']) }}>
    {{-- ceiling --}}
    <div class="ceiling rounded-t-xl border-x-2 border-t-2 border-mist-700"></div>

    {{-- Left Grid Track 'Wall of Bricks' --}}

    @for ($i = 0; $i < $rows; $i++)
        <div class="left-brick border-l-2 border-mist-700"></div>
    @endfor

    {{-- Content Area --}}
    <div class="content-area border border-mist-700">{{ $slot }}</div>

    {{-- Far Right Grid Track --}}
    @for ($i = 0; $i < $rows; $i++)
        <div class="right-brick border-r-2 border-mist-700"></div>
    @endfor

    {{-- floor --}}
    <div class="floor rounded-b-xl border-x-2 border-b-2 border-mist-700"></div>

    <div
        x-bind:style="`transform: rotate(${Math.random() * 360}deg);`"
        class="absolute top-1.5 left-2 flex size-2.5 gap-px rounded-full">
        <div class="basis-full rounded-l-full bg-mist-700"></div>
        <div class="basis-full rounded-r-full bg-mist-700"></div>
    </div>
    <div
        x-bind:style="`transform: rotate(${Math.random() * 360}deg);`"
        class="absolute top-1.5 right-2 flex size-2.5 gap-px rounded-full">
        <div class="basis-full rounded-l-full bg-mist-700"></div>
        <div class="basis-full rounded-r-full bg-mist-700"></div>
    </div>
    <div
        x-bind:style="`transform: rotate(${Math.random() * 360}deg);`"
        class="absolute bottom-1.5 left-2 flex size-2.5 gap-px rounded-full">
        <div class="basis-full rounded-l-full bg-mist-700"></div>
        <div class="basis-full rounded-r-full bg-mist-700"></div>
    </div>
    <div
        x-bind:style="`transform: rotate(${Math.random() * 360}deg);`"
        class="absolute right-2 bottom-1.5 flex size-2.5 gap-px rounded-full">
        <div class="basis-full rounded-l-full bg-mist-700"></div>
        <div class="basis-full rounded-r-full bg-mist-700"></div>
    </div>

    <style>
        .ridecard {
            display: grid;

            grid-template-rows:
              {{ $wallThickness }}
              repeat({{ $rows }}, {{ $rowHeight }})
              {{ $wallThickness }}
              ;

            grid-template-columns:
              {{ $wallThickness }}
              repeat({{ $cols }}, {{ $colWidth }})
              {{ $wallThickness }}
              ;

            row-gap: 4px;
            grid-auto-flow: column;
        }

        .ceiling {
            grid-column: 1 / -1;
            grid-row: 1 / 2;
        }

        .left-brick {
            grid-column: 1 / 2; /* grid-column-start / grid-column-end */
        }

        .content-area {
            display: grid;
            grid-column: 2 / -2;
            grid-row: -2 / 2;
            grid-template-columns: subgrid;
            grid-template-rows: subgrid;
        }

        .right-brick {
            grid-column: -2 / -1;
        }

        .floor {
            grid-column: 1 / -1;
            grid-row: -2 / -1;
        }
    </style>
</div>
