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
