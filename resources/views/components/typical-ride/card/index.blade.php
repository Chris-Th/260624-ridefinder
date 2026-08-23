@props ([
    'typicalRide',
    'iteration',
    'draft',
    'rideTypes',
    'wireModel',
    'savedRideType',
    'rideTypeCount'
])

<div
    x-data="{
        viewBox: '',
        rect: null,
        rideTypes: @js($rideTypes),
        draftName: @js($draft['name']),
        selectedRideTypeId: @js($draft['ride_type']['id']),
        get selectedRideType() {
            return this.rideTypes[this.selectedRideTypeId];
        },
        init() {
            this.$watch('rect', (r) => {
                this.viewBox = `${r.x} ${r.y} ${r.width} ${r.height}`;
            });
        }
    }"
    x-bind:style="`--ride-type-color: ${selectedRideType.color}; --ride-type-bg-color: ${selectedRideType.bgcolor}`"
    class="relative min-w-fit break-inside-avoid">
    <x-vectors.filters.textures.el
        class="absolute size-full rounded-xl"
        :opacity="0.4"
        :id="'texture-1-'.$typicalRide->id % 3" />

    <x-typical-ride.card.skeletton-sandbox
        class="typicalride-card absolute mb-5 w-full inset-shadow-sm inset-shadow-mist-500"
        x-init="rect = $el.getBoundingClientRect()"
        :row-gap="8"
        :row-height="16"
        :min-col-width="16"
        :ride-tags-count="$typicalRide->ride_tags_count">
        <div x-cloak {{ $attributes->except(['wire:model', 'wire:key'])->merge([ 'class' => 'typicalride-content' ]) }}>
            <div
                x-bind:style="`border-color: ${selectedRideType.color}`"
                class="header border inset-shadow-xs inset-shadow-mist-500">
                <div
                    x-bind:style="`color: ${selectedRideType.color}`"
                    class="iteration flex w-full items-center justify-center px-1">
                    {{ sprintf('%03d', $iteration) }}
                </div>
                <div
                    x-text="draftName"
                    x-bind:style="`background-color: ${selectedRideType.bgcolor};`"
                    class="ride-name flex w-full items-center justify-start truncate px-1 font-bold text-nowrap uppercase"></div>
            </div>
            <div class="full-row"></div>

            @isset ($draft['ride_type'])
                <x-typical-ride.card.selectable-property
                    x-bind:class="showOptions ? 'z-30' : 'z-20'"
                    :saved-value="$savedRideType"
                    key="TYPE"
                    x-model="selectedRideTypeId"
                    wire:model="{{ $wireModel }}"
                    :size="$rideTypeCount">
                    @foreach ($rideTypes as $type)
                        <x-typical-ride.card.selectable-property.option
                            value="{{ $type['id'] }}"
                            wire:key="ridetype-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $type['id'] }}"
                            x-bind:style="`border-color: ${selectedRideType.color}`"
                            x-bind:class="rideTypes[{{ $loop->index }}].name === '{{ $type['name'] }}' ? 'border z-30' : 'border-none z-30'">
                            <x-typical-ride.card.selectable-property.ride-type-stamp
                                :color="$this->getRideTypeColorVar('400', $type['name'])"
                                :ridetype="$type['name']"
                                uniqueid="ridetype-dropdown-option-stamp-{{ $typicalRide?->id }}-{{ $type['id'] }}"
                                :icon-path="$type['icon_view_component']" />
                            <span class="w-full self-center">{{ $type['name'] }}</span>
                        </x-typical-ride.card.selectable-property.option>

                    @endforeach
                </x-typical-ride.card.selectable-property>
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
            <x-typical-ride.card.ride-tags :ride-tags="$typicalRide->rideTags" />

            <div class="absolute top-12 left-28 flex size-full items-center justify-center border-mist-700/40">
                @foreach ($rideTypes as $type)
                    <div
                        class="absolute inset-0 flex items-center justify-center"
                        x-show="selectedRideTypeId == {{ $type['id'] }}"
                        x-cloak
                        wire:key="stamp-{{ $typicalRide->id }}-{{ $type['id'] }}">
                        <x-vectors.stamps.round-stamp
                            class="absolute inset-0 flex items-center justify-center"
                            color="var(--ride-type-color)"
                            :ridetype="$type['name']"
                            opacity="0.8"
                            x-data="stamp({
                            opacity: 0.7,
                            radius: 45,
                            innerBorder: 1,
                            outerBorder: 3,
                            borderGap: 1.5,
                            smearFactor: 1.5,
                            padding: 6,
                            maxJitter: 0.8,
                            // topText: '{{ $typicalRide->name }}',
                            centerText: '{{ $typicalRide?->discipline?->name }}',
                            // bottomText: '*{{ $draft['ride_type']['name'] }}*',
                            font: {top: {size: 'sm', weight: 'bold'}, center: {size: 'md', weight: 'normal'}, bottom:{size: 'lg', weight: 'thin'}},
                            maxTransform: { tx: 15, ty: 20, rot: 30 },
                            iconFilter: 'soft',
                        })">
                            <x-dynamic-component
                                uniqueid="typical-ride-{{ $typicalRide->id }}-type-{{ $type['id'] }}"
                                :component="$type['icon_view_component']"
                                x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px] origin-center`"
                                x-bind:x="iconRect.x"
                                x-bind:y="iconRect.y"
                                x-bind:width="iconRect.width"
                                x-bind:height="iconRect.height"
                                class="mt-4" />
                        </x-vectors.stamps.round-stamp>
                    </div>
                @endforeach
            </div>
        </div>
    </x-typical-ride.card.skeletton-sandbox>
</div>

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
            /* box-shadow: 0 0 5px 1px --alpha(var(--color-blue-100) / 100%); */
            box-shadow: 0 0 2px 2px var(--color-mist-800);
        }
    }

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

            .iteration {
                grid-column: 1 / 3;
            }
            .ride-name {
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
            .whole-row {
                grid-column: 1 / -1;
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

        .ride-tag {
            display: grid;
            grid-column: 1 / -1;
            grid-template-columns: subgrid;
            grid-template-rows: subgrid;

            .stamp {
                grid-column: 1 / 3;
            }

            .spacer {
                grid-column: 3;
            }

            .tag {
                grid-column: 4 / -1;
            }
        }
    }
</style>
