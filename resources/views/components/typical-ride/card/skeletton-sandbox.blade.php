@props ([
    'rowHeight' => 20,
    'minColWidth' => 20,
    // 'rows' => 12,
    'cols' => 12,
    'wallThickness' => 16,
    'rowGap' => 4,
    'rideTagsCount' => 0
])

@php
    $rows = $rideTagsCount > 0
        ? 7 + $rideTagsCount
        : 6;
@endphp

<div
    {{ $attributes->merge(['class' => 'typicalride-card relative rounded-xl break-inside-avoid']) }}
    style="
        --rows: {{ $rows }};
        --cols: {{ $cols }};
        --row-height: {{ $rowHeight }}px;
        --col-width: minmax({{ $minColWidth }}px, 1fr);
        --wall-thickness: {{ $wallThickness }}px;
        --row-gap: {{ $rowGap }}px;">
    {{-- ceiling --}}
    <div class="ceiling rounded-t-xl border-x-2 border-t-2 border-mist-900"></div>

    {{-- Left Grid Track 'Wall of Bricks' --}}
    @for ($i = 0; $i < $rows; $i++)
        <div class="left-brick border-l-2 border-mist-900"></div>
    @endfor

    {{-- Content Area --}}
    <div class="content-area border-mist-900/70">{{ $slot }}</div>

    {{-- Right Grid Track --}}
    @for ($i = 0; $i < $rows; $i++)
        <div class="right-brick border-r-2 border-mist-900"></div>
    @endfor

    {{-- floor --}}
    <div class="floor rounded-b-xl border-x-2 border-b-2 border-mist-900"></div>

    <x-screw-head class="top-2 left-1.5" />
    <x-screw-head class="top-2 right-1.5" />
    <x-screw-head class="bottom-2 left-1.5" />
    <x-screw-head class="right-1.5 bottom-2" />
</div>

{{-- Add To Styles: --}}
{{--
<style>
        .typicalride-card {
        display: grid;

        grid-template-rows:
            var(--wall-thickness)
            repeat(var(--rows), var(--row-height))
            var(--wall-thickness);

        grid-template-columns:
            var(--wall-thickness)
            repeat(var(--cols), var(--col-width))
            var(--wall-thickness);

        row-gap: var(--row-gap);
        grid-auto-flow: column dense;

        .ceiling {
            grid-column: 1 / -1;
            grid-row: 1 / 2;
        }

        .left-brick {
            grid-column: 1 / 2; /* grid-column-start / grid-column-end */
        }

        .content-area {
            display: grid;
            grid-column: 2 / span var(--cols);
            grid-row: 2 / span var(--rows);
            grid-template-columns: subgrid;
            grid-template-rows: repeat(var(--rows), calc(var(--row-height) + var(--row-gap)));
            /* grid-template-rows: subgrid; */
        }

        .right-brick {
            grid-column: -2 / -1;
        }

        .floor {
            grid-column: 1 / -1;
            grid-row: -2 / -1;
        }
        .screw-head {
            box-shadow: 0 0 2px 2px var(--color-mist-600);
        }
    }
</style>
--}}
