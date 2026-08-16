@props ([
    'typicalRide' => null,
    'iteration' => 0
])

@aware ([
    'rows' => 12,
    'cols' => 12,
])

<div {{ $attributes->merge([ 'class' => 'typicalride-content' ]) }}>
    <div class="header border border-{{ $typicalRide?->rideType?->name }}-800 inset-shadow-xs inset-shadow-mist-500">
        <div
            class="iteration flex justify-center items-center w-full px-1 text-{{ $typicalRide?->rideType?->name }}-300">
            {{ sprintf('%03d', $iteration) }}
        </div>
        {{-- <div
            class="col-span-2 border-y border-{{ $typicalRide?->rideType?->name }}-800 bg-{{ $typicalRide?->rideType?->name }}-400/70"></div> --}}
        <div
            class="ride-name truncate text-nowrap uppercase flex justify-start items-center w-full bg-{{ $typicalRide?->rideType?->name }}-400/70 px-1 font-bold">
            {{ $typicalRide->name }}
        </div>
    </div>
    <div class="full-row"></div>
    @isset ($typicalRide?->rideType?->name)
        <div class="full-row">
            <div class="key">TYPE</div>
            <div class="val">{{ $typicalRide?->rideType?->name }}</div>
        </div>
    @endisset

    @isset ($typicalRide?->pace?->name)
        <div class="full-row">
            <div class="key">PACE</div>
            <div class="val">{{ $typicalRide?->pace?->name }}</div>
        </div>
    @endisset

    @isset ($typicalRide?->discipline?->name)
        <div class="full-row">
            <div class="key">DISC</div>
            <div class="val">{{ $typicalRide?->discipline?->name }}</div>
        </div>
    @endisset

    @if ($typicalRide->max_distance || $typicalRide->min_distance)
        <div class="full-row text-nowrap">
            <div class="key">DIST</div>

            @if ( ($typicalRide->max_distance === $typicalRide->min_distance) && $typicalRide->max_distance != null)
                <div class="val">{{ $typicalRide->max_distance }} Km</div>

            @elseif ( $typicalRide->min_distance && $typicalRide->max_distance )
                <div class="val">{{ $typicalRide->min_distance }} - {{ $typicalRide->max_distance }} Km</div>

            @elseif ( $typicalRide->min_distance )
                <div class="val">{{ $typicalRide->min_distance }} Km or more</div>

            @elseif ( $typicalRide->max_distance )
                <div class="val">Up to {{ $typicalRide->max_distance }} Km</div>

            @endif
        </div>
    @endif

    {{ $slot }}
</div>

{{-- Add To Styles: --}}

{{--
<style>
    .typicalride-content {
        display: grid;
        grid-template-columns: subgrid;
        grid-template-rows: subgrid;
        grid-column: 1 / -1;
        grid-row: 1 / -1;

        .header {
            grid-column: 1 / -1;
            grid-row: 1 / 2;
            display: grid;
            grid-template-columns: subgrid;
            grid-template-rows: subgrid;

            .index {
                grid-column: 1 / 3;
            }
            .ride-type {
                grid-column: 3 / -1;
            }
        }

        .full-row {
            display: grid;
            grid-column: 1 / -1;
            grid-template-columns: subgrid;
            grid-template-rows: subgrid;

            .key {
                grid-column: 1 / 4;
            }
            .val {
                grid-column: 4 / -1;
            }
        }

        .half-row {
            display: grid;
            grid-column: span calc(var(--rows) / 2);
            grid-template-columns: subgrid;
            grid-template-rows: subgrid;

            .key {
                grid-column: 1 / 3;
            }
            .val {
                grid-column: 3 / -1;
            }
        }
    }
</style>

--}}
