@php
use App\Enums\RideDistance;
use Illuminate\Support\Arr;
@endphp

@props ([
    'typicalRide',
    'iteration',
    'draft',
    'rideTypes',
    'paces',
    'disciplines',
    'rideTypeWireModel',
    'savedRideTypeColor',
    'savedPace',
    'savedDiscipline',
    'savedMinDistance',
    'savedMaxDistance',
    'rideTypeCount',
    'paceCount',
    'disciplineCount',
    'distances' => Arr::from(RideDistance::cases())
])

<div
    x-data="{
        viewBox: '',
        rect: null,
        rideTypes: @js($rideTypes),
        disciplines: @js($disciplines),
        paces: @js($paces),
        distances: @js($distances),
        draftName: @js($draft['name']),
        selectedRideTypeId: @js($draft['ride_type']['id']),
        selectedPaceId: @js($draft['pace']['id']),
        selectedDisciplineId: @js($draft['discipline']['id']),
        selectedDistanceRange: {
            min: @js($draft['distance_range']['min']?->value),
            max: @js($draft['distance_range']['max']?->value),
        },
        minMaxDistanceString: '@js($draft['distance_range']['min']?->value),@js($draft['distance_range']['max']?->value)',
        minMaxDistanceArr: [],
        maxDistanceOptionsCount: 0,
        minDistanceOptionsCount: 0,
        get selectedRideType() {
            return this.rideTypes[this.selectedRideTypeId];
        },
        get selectedDiscipline() {
            return this.disciplines[this.selectedDisciplineId];
        },
        get selectedPace() {
            return this.paces[this.selectedPaceId];
        },
        distanceRangeString(min, max) {
            if(!min && !max) return null;
            if(min === max) return `${max} Km`;
            if(min  && max ) return `${min} - ${max} Km`;
            if(min) return `${min} Km or more`;
            return `Up to ${max} Km`;
        },
        countDistancesUnder(distance) {
            let distancesArray = Object.values(this.distances);
            const index = distancesArray.indexOf(distance);
            distancesArray.splice(index);
            console.log('distancesArray.length', distancesArray.length)
            return distancesArray.length;
        },
        countDistancesOver(distance) {
            let distancesArray = Object.values(this.distances);
            const index = distancesArray.indexOf(distance);
            const removed = distancesArray.splice(index + 1);
            console.log('removed.length', removed.length)
            return removed.length;
        },
        init() {
            this.$watch('rect', (r) => {
                this.viewBox = `${r.x} ${r.y} ${r.width} ${r.height}`;
            });
            this.minMaxDistArr = this.minMaxDistanceString.split(',');
            console.log('minMaxDistanceString', this.minMaxDistanceString);
            this.maxDistanceOptionsCount = this.countDistancesOver(this.selectedDistanceRange.min);
            this.minDistanceOptionsCount = this.countDistancesUnder(this.selectedDistanceRange.min);
            // this.$watch('selectedDistanceRange', (range) => {
            //     this.$nextTick(() => {
            //         this.maxDistanceOptionsCount = this.countDistancesOver(range.min);
            //         this.minDistanceOptionsCount = this.countDistancesUnder(range.min);
            //         console.log('this.maxDistanceOptionsCount', this.maxDistanceOptionsCount, 'this.minDistanceOptionsCount', this.minDistanceOptionsCount)
            //     })

            // })
            this.$watch('minMaxDistanceArr', (arr) => {

                let lastChoice = arr[arr.length - 1];
                arr.sort((a, b) => a - b);
                if (arr.size > 2) {
                    arr.forEach(v => v <= lastChoice)
                }
                this.selectedDistanceRange.min = arr[0];
                this.selectedDistanceRange.max = arr[arr.length - 1];
            })
        }
    }"
    x-bind:style="`--ride-type-color: ${selectedRideType.color}; --ride-type-bg-color: ${selectedRideType.bgcolor}`"
    class="victor-mono-alternates relative min-w-fit break-inside-avoid">
    <x-vectors.filters.textures.el
        class="absolute size-full rounded-xl"
        :opacity="1"
        :id="'texture-1-'.$typicalRide->id % 3" />

    <x-typical-ride.card.skeletton-sandbox
        class="typicalride-card absolute mb-5 w-full inset-shadow-sm inset-shadow-mist-500"
        x-init="rect = $el.getBoundingClientRect()"
        :row-gap="8"
        :row-height="16"
        :min-col-width="16"
        :ride-tags-count="$typicalRide->ride_tags_count">
        <div
            x-cloak
            {{ $attributes->except(['wire:model', 'wire:key'])->merge([ 'class' => 'typicalride-content' ]) }}>
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
                    class="font-thin"
                    :saved-value="$typicalRide->rideType->name"
                    x-bind:style="selectedRideType.name !== `{{ $typicalRide->rideType->name }}` ? `color: ${selectedRideType.color}; font-style: italic` : ''"
                    key="TYPE"
                    x-model="selectedRideTypeId"
                    wire:model="{{ $rideTypeWireModel }}"
                    :size="$rideTypeCount">
                    <x-slot:selectedvalue
                        x-text="selectedRideType.name"
                        x-bind:style="selectedRideType.name !== `{{ $typicalRide->rideType->name }}` ? `color: ${selectedRideType.color}; font-style: italic` : ''"></x-slot:selectedvalue>
                    @foreach ($rideTypes as $type)
                        <x-typical-ride.card.selectable-property.option
                            value="{{ $type['id'] }}"
                            wire:key="ridetype-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $type['id'] }}"
                            x-bind:style="`border-color: {{ $savedRideTypeColor }}`"
                            x-bind:class="rideTypes[{{ $loop->iteration }}].name === '{{ $typicalRide->rideType->name }}' ? 'border z-30' : 'border-none z-30'">
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
                <x-typical-ride.card.selectable-property
                    x-bind:class="showOptions ? 'z-30' : 'z-20'"
                    class="font-bold"
                    style="font-style: oblique"
                    :saved-value="$savedPace"
                    key="PACE"
                    x-model="selectedPaceId"
                    wire:model="{{ $paceWireModel }}"
                    :size="$paceCount">
                    <x-slot:selectedvalue
                        class="italic"
                        x-text="selectedPace.name"
                        x-bind:style="selectedPace.name !== `{{ $savedPace }}` ? `font-style: italic` : ''"></x-slot:selectedvalue>

                    @foreach ($paces as $pace)
                        <x-typical-ride.card.selectable-property.option
                            value="{{ $pace['id'] }}"
                            wire:key="pace-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $pace['id'] }}"
                            class="z-30 border-neutral-500"
                            x-bind:class="rideTypes[{{ $loop->iteration }}].name === '{{ $savedPace }}' ? 'border' : 'border-none'">
                            <span class="w-full self-center">{{ $pace['name'] }}</span>
                        </x-typical-ride.card.selectable-property.option>

                    @endforeach
                </x-typical-ride.card.selectable-property>
            @endisset

            @isset ($typicalRide?->discipline?->name)
                <x-typical-ride.card.selectable-property
                    x-bind:class="showOptions ? 'z-30' : 'z-20'"
                    :saved-value="$typicalRide->discipline->name"
                    key="DISC"
                    x-model="selectedDisciplineId"
                    wire:model="{{ $disciplineWireModel }}"
                    :size="$disciplineCount">
                    <x-slot:selectedvalue
                        x-text="selectedDiscipline.name"
                        x-bind:style="selectedDiscipline.name !== `{{ $savedDiscipline }}` ? `font-style: italic` : ''"></x-slot:selectedvalue>
                    @foreach ($disciplines as $discipline)
                        <x-typical-ride.card.selectable-property.option
                            value="{{ $discipline['id'] }}"
                            wire:key="discipline-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $discipline['id'] }}"
                            class="z-30 border-neutral-500"
                            x-bind:class="rideTypes[{{ $loop->iteration }}].name === '{{ $savedDiscipline }}' ? 'border' : 'border-none'">
                            <span class="w-full self-center">{{ $discipline['name'] }}</span>
                        </x-typical-ride.card.selectable-property.option>

                    @endforeach
                </x-typical-ride.card.selectable-property>
            @endisset

            @if ($typicalRide->max_distance || $typicalRide->min_distance)
                <div
                    x-data="{ showOptions: false }"
                    x-on:click="showOptions = true"
                    x-on:click.outside="showOptions = false"
                    class="full-row relative">
                    <div class="key">DIST</div>

                    {{-- Selected Distance Range Value --}}
                    <div
                        class="val cursor-pointer"
                        x-bind:class="selectedDistanceRange.min != `{{ $typicalRide->min_distance }}` || selectedDistanceRange.max != `{{ $typicalRide->max_distance }}` ? 'italic' : ''"
                        x-text="distanceRangeString(selectedDistanceRange.min, selectedDistanceRange.max)">
                        {{--  --}}
                    </div>

                    <div
                        x-cloak
                        x-bind:class="
                            showOptions
                                ? 'translate-x-0 rotate-x-0 rotate-y-0 scale-100'
                                : 'translate-y-6 rotate-x-90 rotate-y-90 scale-0'
                        "
                        class="border-base-100 relative z-40 flex size-fit origin-top-left items-stretch justify-stretch border-2 transition-transform transition-normal duration-200">
                        <div>
                            @foreach (RideDistance::cases() as $distance)
                                <x-typical-ride.card.checkboxes.checkbox
                                    x-model="minMaxDistanceArr"
                                    :value="$distance->value"
                                    id="distance-checkbox-{{ $distance->value }}">
                                    {{ $distance->value }}
                                </x-typical-ride.card.checkboxes.checkbox>
                            @endforeach
                        </div>
                        <div>
                            @foreach (RideDistance::cases() as $distance)
                                <x-typical-ride.card.checkboxes.checkbox
                                    x-model="minMaxDistanceArr"
                                    :value="$distance->value"
                                    id="distance-checkbox-{{ $distance->value }}">
                                    {{ $distance->value }}
                                </x-typical-ride.card.checkboxes.checkbox>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endif

            <x-typical-ride.card.ride-tags :ride-tags="$typicalRide->rideTags" />

            <div class="absolute top-12 -right-28 flex size-full items-center justify-center border-mist-700/40">
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
                            iconSize: 60,
                            innerBorder: 1,
                            outerBorder: 3,
                            borderGap: 1.5,
                            smearFactor: 1.5,
                            pressureFaint: 0.8, // 1: default faint effect | < 1: increased random faint | > 1: decreased faint | 'none': no random faint
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
