@props (['rootclass' => $attributes->has('rootclass') ? $attributes->get('rootclass') : '', 'rows' => 19, 'cols' => 12])

<div
    x-data="{
    rows: 0,
    cols: 0,
    init() {
        this.rows = Number({{ $rows }}),
        this.cols = Number({{ $cols }})
    },
}">
    <div class="ridecard {{ $rootclass }} relative py-1">
        {{--
        Whenever inserting new rows to subgrid passed to {{ $slot }}:
            - add a grid item (brick) to each l + R brickwall grid Track
            - increase row-span-* of content space grid area {{ $slot }}
            - increase grid-template-rows number n: 16px repeat(n, 1fr) 16px; of .ridecard selector.
        --}}
        {{-- Top Thin Full Width Ceiling Grid item --}}
        <div
            class="col-span-{{ $cols}} grid-flow-col border-x-2 border-t-2  grid grid-cols-subgrid gap-x-1 items-start">
            {{-- <template x-for="i in cols">
                <div class="place-self-stretch border-t-2"></div>
            </template> --}}
        </div>

        {{-- Left Grid Track 'Wall of Bricks' --}}
        <template x-for="i in rows">
            <div class="border-l-2"></div>
        </template>

        {{-- Bottom Full Width Floor Grid Item --}}

        <div class="col-span-{{ $cols}} grid-flow-col border-x-2 border-b-2 grid grid-cols-subgrid gap-x-1 items-start">
            {{-- <template x-for="i in cols">
                <div class="row-span-full place-self-stretch border-b-2"></div>
            </template> --}}
        </div>

        {{-- Content Space Grid Area --}}
        <div {{ $attributes->merge(['class' => 'row-span-'.$rows.' col-span-'.$cols - 2]) }}>{{ $slot }}</div>

        {{-- Far Right Grid Track --}}
        <template x-for="i in rows">
            <div class="border-r-2"></div>
        </template>
    </div>

    <style>
        .ridecard {
            display: grid;
            grid-template-rows: 16px repeat({{ $rows }}, 28px) 16px;
            grid-template-columns: repeat({{ $cols }}, minmax(20px, 1fr));
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
