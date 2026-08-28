<div
    x-data="{
        showOptions: false
    }"
    class="full-row"
    x-on:click="showOptions = true"
    x-on:click.outside="showOptions = false">
    <div class="key">TYPE</div>
    <div class="val">
        <div
            x-show="!showOptions"
            x-bind:style="selectedRideType.name !== `{{ $rideType['name'] }}` ? `color: ${selectedRideType.color}; font-style: italic` : ''"
            class="absolute w-full cursor-pointer"
            x-text="selectedRideType.name"></div>

        <select
            x-model="selectedRideTypeId"
            wire:model="draft.ride_type.id"
            size="{{ $this->rideTypes()->count() }}"
            x-show="showOptions"
            x-cloak
            class="bg-base-200 relative z-50 w-48 overflow-y-clip border-none p-0">
            @foreach ($this->rideTypes() as $type)
                <option
                    value="{{ $type->id }}"
                    x-on:click.stop="showOptions = false"
                    wire:key="ridetype-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $type->id }}"
                    x-bind:style="`border-color: ${selectedRideType.color}`"
                    x-bind:class="'{{ $rideType['name'] }}' === '{{ $type->name }}' ? 'border' : 'border-none'"
                    class="odd:bg-base-300 even:bg-base-200 flex h-10 w-full cursor-pointer gap-3">
                    <x-vectors.stamps.round-stamp
                        :color="$this->getRideTypeColorVar('400', $type->name)"
                        :ridetype="$type?->name"
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
                                smearFactor: 0,
                                centerText: '',
                                maxTransform: { tx: 0, ty: 0, rot: 0 },
                                iconFilter: 'soft'
                            })
                        ">
                        <x-dynamic-component
                            uniqueid="ridetype-dropdown-option-stamp-{{ $typicalRide?->id }}-{{ $type->id }}"
                            :component="$type->icon_view_component"
                            x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]  origin-center`"
                            x-bind:x="iconRect.x"
                            x-bind:y="iconRect.y"
                            x-bind:width="iconRect.width"
                            x-bind:height="iconRect.height"
                            class="" />
                    </x-vectors.stamps.round-stamp>
                    <span class="w-full self-center">{{ $type->name }}</span>
                </option>
            @endforeach
        </select>
    </div>
</div>

<link
    rel="preconnect"
    href="https://fonts.googleapis.com" />
<link
    rel="preconnect"
    href="https://fonts.gstatic.com"
    crossorigin />
<link
    href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:ital,wght@0,100..800;1,100..800&display=swap"
    rel="stylesheet" />
<link
    href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:ital,wght@0,100;0,400;0,700;1,100;1,400;1,700&family=Share+Tech+Mono&family=Victor+Mono:ital,wght@0,100..700;1,100..700&display=swap"
    rel="stylesheet" />

<div
    x-cloak
    x-bind:class="
        showOptions ? 'translate-x-0 rotate-x-0 rotate-y-0 scale-100' : 'translate-y-6 rotate-x-90 rotate-y-90 scale-0'
    "
    class="border-base-100 relative flex size-fit origin-top-left flex-col items-stretch justify-stretch border-2 transition-transform transition-normal duration-200">
    {{-- Min-Distance Select --}}
    <select
        {{-- size="{{ count(RideDistance::cases()) + 2 }}" --}}
        x-bind:size="minDistanceOptionsCount"
        class="bg-base-200 border-base-100 h-full grow origin-top-left p-0"
        wire:model="{{ $distanceRangeWireModel }}.min"
        x-model="selectedDistanceRange.min">
        {{-- <x-typical-ride.card.selectable-property.option
                                class="pointer-events-none cursor-not-allowed flex-col justify-center px-2 text-neutral-400">
                                Min:
                            </x-typical-ride.card.selectable-property.option> --}}

        @foreach (RideDistance::cases() as $distance)
            <template
                x-if="Number({{ $distance->value }}) < selectedDistanceRange.min || Number({{ $distance->value }}) === 0">
                <x-typical-ride.card.selectable-property.option
                    value="{{ $distance->value }}"
                    wire:key="min-dist-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $distance->value }}"
                    x-bind:class="{
                                            'border-base-100! border-2!': `{{ $distance->value }}` == `{{ $savedMinDistance }}`,
                                            'bg-base-100! italic text-neutral-400! pointer-events-none cursor-default': `{{ $distance->value }}` == selectedDistanceRange.min,
                                            // 'text-neutral-500! font-thin pointer-events-none cursor-default':  Number({{ $distance->value }}) > Number(selectedDistanceRange.max)
                                            'hidden':  Number({{ $distance->value }}) > Number(selectedDistanceRange.max)
                                        }"
                    class="cursor-pointer items-center border-2 border-green-300 px-2">
                    min: {{ $distance->value }}
                </x-typical-ride.card.selectable-property.option>
            </template>
        @endforeach
    </select>

    {{-- Max-Distance Select --}}
    <select
        {{-- size="{{ count(RideDistance::cases()) + 2 }}" --}}
        x-bind:size="maxDistanceOptionsCount"
        class="bg-base-200 border-base-100 h-full grow origin-top-left p-0"
        wire:model="{{ $distanceRangeWireModel }}.max"
        x-model="selectedDistanceRange.max">
        {{-- <x-typical-ride.card.selectable-property.option
                                class="pointer-events-none cursor-not-allowed flex-col justify-center px-2 text-neutral-400">
                                Max:
                            </x-typical-ride.card.selectable-property.option> --}}

        @foreach (RideDistance::cases() as $distance)
            <template
                x-if="Number({{ $distance->value }}) >= selectedDistanceRange.min && Number({{ $distance->value }}) !== 0">
                <x-typical-ride.card.selectable-property.option
                    x-show="Number({{ $distance->value }}) >= Number(selectedDistanceRange.min)"
                    value="{{ $distance->value }}"
                    wire:key="max-dist-dropdown-wire-key-{{ $typicalRide?->id }}-{{ $distance->value }}"
                    x-bind:class="{
                                        'border-base-100! border-2!': `{{ $distance->value }}` == `{{ $savedMaxDistance }}`,
                                        'bg-base-100! italic text-neutral-400! pointer-events-none cursor-default': `{{ $distance->value }}` == selectedDistanceRange.max,
                                        /* 'text-neutral-500! font-thin pointer-events-none cursor-default':  Number({{ $distance->value }}) < Number(selectedDistanceRange.min) */

                                    }"
                    class="cursor-pointer items-center border-2 border-red-300 px-2">
                    max: {{ $distance->value }}
                </x-typical-ride.card.selectable-property.option>
            </template>
            <x-typical-ride.card.selectable-property.option
                x-show="Number({{ $distance->value }}) < Number(selectedDistanceRange.min)"
                class="relative z-0 bg-transparent!">
                &nbsp;</x-typical-ride.card.selectable-property.option
            >

        @endforeach
        <x-typical-ride.card.selectable-property.option>
            150&nbsp;+&nbsp;Km
        </x-typical-ride.card.selectable-property.option>
    </select>
</div>
