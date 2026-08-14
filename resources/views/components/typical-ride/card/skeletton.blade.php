@props ([
    'rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '',
    'rowHeight' => '20px',
    'colWidth' => 'minmax(20px, 1fr)',
    'rows' => 19,
    'cols' => 12
])

@php
    $colsContent = $cols - 2;
@endphp

<div
    x-data="{
    rows: 0,
    cols: 0,
    init() {
        this.rows = Number({{ $rows }}),
        this.cols = Number({{ $cols }})
    },
}"
    class="ridecard {{ $rootclass }} relative border-mist-700  break-inside-avoid">
    {{--
        Whenever inserting new rows to subgrid passed to {{ $slot }}:
            - add a grid item (brick) to each l + R brickwall grid Track
            - increase row-span-* of content space grid area {{ $slot }}
            - increase grid-template-rows number n: 16px repeat(n, 1fr) 16px; of .ridecard selector.
        --}}
    {{-- Top Thin Full Width Ceiling Grid item --}}
    <div
        class="col-span-{{ $cols + 2 }} grid-flow-col border-x-2 border-t-2 border-mist-700  grid grid-cols-subgrid grid-rows-subgrid gap-x-1 items-start rounded-t-xl">
        {{-- <template x-for="i in cols">
                <div class="place-self-stretch border-t-2"></div>
            </template> --}}
    </div>

    {{-- Left Grid Track 'Wall of Bricks' --}}

    <template x-for="i in rows">
        <div class="border-l-2 border-mist-700"></div>
    </template>

    {{-- Bottom Full Width Floor Grid Item --}}

    <div
        class="col-span-{{ $cols + 2 }} grid-flow-col border-x-2 border-b-2 border-mist-700 grid grid-cols-subgrid grid-rows-subgrid gap-x-1 items-start rounded-b-xl">
        {{-- <template x-for="i in cols">
                <div class="row-span-full place-self-stretch border-b-2"></div>
            </template> --}}
    </div>

    {{-- Content Space Grid Area --}}
    <div
        {{ $attributes->merge(['class' => ' break-inside-avoid grid-cols-subgrid grid-rows-subgrid row-span-'.$rows.' col-span-'.$cols]) }}>
        {{ $slot }}
    </div>

    {{-- Far Right Grid Track --}}
    <template x-for="i in rows">
        <div class="border-r-2 border-mist-700"></div>
    </template>

    <style>
        .ridecard {
            display: grid;
            grid-template-rows: 16px repeat({{ $rows }}, {{ $rowHeight }}) 16px;
            /* grid-template-columns: 16px repeat({{ $cols }}, minmax(20px, 1fr)) 16px; */
            grid-template-columns: 16px repeat({{ $cols }}, {{ $colWidth }}) 16px;
            grid-auto-flow: column;
            row-gap: 4px;
        }

        .brickwall {
            display: grid;
            grid-template-rows: subgrid;
            grid-template-columns: subgrid;
        }

        /*  .ridecard>div {
             padding-top: 6px;
         } */
    </style>
</div>
