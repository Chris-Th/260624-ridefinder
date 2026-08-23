@props ([
    'options' => [],
    'key' => '',
    'savedValue' => '',
    'size' => null
])

<div
    x-data="{
        showOptions: false
    }"
    {{ $attributes->except(['wire:model', 'x-model'])->merge(['class' => 'full-row']) }}
    x-on:click="showOptions = true"
    x-on:click.outside="showOptions = false">
    <div class="key">{{ $key }}</div>
    <div class="val">
        <div
            {{-- x-show="!showOptions" --}}
            x-bind:style="selectedRideType.name !== `{{ $savedValue }}` ? `color: ${selectedRideType.color}; font-style: italic` : ''"
            class="absolute w-full cursor-pointer"
            x-text="selectedRideType.name"></div>

        <select
            {{ $attributes->filter(function ($val, $key) {
                    return $key === 'wire:model' || $key === 'x-model';
                })
            }}
            size="{{ $size }}"
            x-cloak
            x-bind:class="
                showOptions
                    ? '-translate-x-12 rotate-x-0 rotate-y-0 scale-100'
                    : 'translate-x-0 -rotate-x-90 rotate-y-45 scale-25'
            "
            class="bg-base-200 border-base-100 relative z-50 w-48 origin-top-left overflow-y-clip border-2 p-0 transition-transform transition-normal duration-500">
            {{ $slot }}
        </select>
    </div>
</div>
