@props ([
    'typicalRide' => null,
    'index' => 1
])

@aware ([
    'rows' => 12,
    'cols' => 12,
])

<div class="typicalride-content">
    <div class="header border">
        <div
            class="index border-y flex justify-center items-center w-full border-l border-{{ $typicalRide?->rideType?->name }}-800 px-1 text-{{ $typicalRide?->rideType?->name }}-300">
            {{ sprintf('%03d', $index) }}
        </div>
        {{-- <div
            class="col-span-2 border-y border-{{ $typicalRide?->rideType?->name }}-800 bg-{{ $typicalRide?->rideType?->name }}-400/70"></div> --}}
        <div
            class="ride-type truncate text-nowrap uppercase flex justify-start items-center w-full border-y border-r border-{{ $typicalRide?->rideType?->name }}-800 bg-{{ $typicalRide?->rideType?->name }}-400/70 px-1 font-bold">
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
</div>
