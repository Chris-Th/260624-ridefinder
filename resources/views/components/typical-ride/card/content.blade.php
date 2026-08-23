@props ([
    'typicalRide' => null,
    'iteration' => 0
])

@aware ([
    'rows' => 12,
    'cols' => 12,
])

<div
    x-cloak
    {{ $attributes->merge([ 'class' => 'typicalride-content' ]) }}>
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

    <x-typical-ride.card.property
        x-cloak
        options="rideTypesJson()"
        class="full-row relative cursor-pointer">
        @isset ($typicalRide?->rideType?->name)
            <div class="key">TYPE</div>
            <div class="val">
                <x-typical-ride.card.property.value wire:text="typicalRide.rideType.name" />

                <x-typical-ride.card.property.options size="{{ $this->rideTypes()->count() }}">
                    @foreach ($this->rideTypes() as $rideType)
                        <option
                            x-on:click="$wire.update('ride_type', {{ $typicalRide->id }}, {{ $rideType->id }})"
                            wire:key="ridetype-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $rideType->id }}"
                            class="odd:bg-base-300 even:bg-base-200 flex h-10 w-full gap-3">
                            <x-vectors.stamps.round-stamp
                                :color="$this->getRideTypeColorVar('400', $rideType?->name)"
                                :ridetype="$rideType?->name"
                                opacity="0.8"
                                class="w-20"
                                x-data="
                                    stamp({
                                        opacity: 1,
                                        radius: 20,
                                        innerBorder: 0,
                                        outerBorder: 1,
                                        padding: 2,
                                        maxJitter: 0.5,
                                        smearFactor: 0.7,
                                        centerText: '',
                                        maxTransform: { tx: 0, ty: 0, rot: 0 },
                                        iconFilter: 'soft'
                                    })
                                ">
                                <x-dynamic-component
                                    uniqueid="ridetype-dropdown-option-stamp-{{ $typicalRide?->id }}-{{ $rideType->id }}"
                                    :component="$rideType->icon_view_component"
                                    x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]  origin-center`"
                                    x-bind:x="iconRect.x"
                                    x-bind:y="iconRect.y"
                                    x-bind:width="iconRect.width"
                                    x-bind:height="iconRect.height"
                                    class="" />
                            </x-vectors.stamps.round-stamp>
                            <span class="w-full self-center">{{ $rideType->name }}</span>
                        </option>
                    @endforeach
                </x-typical-ride.card.property.options>
            </div>

        @endisset
    </x-typical-ride.card.property>

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
