@props ([
    'options' => [],
    'key' => '',
    'size' => null,
    'leftId',
    'rightId'
])

<div
    x-data="{
        showOptions: false
    }"
    {{ $attributes->merge(['class' => 'relative']) }}
    x-on:click="showOptions = true"
    x-on:click.outside="showOptions = false">
    @if (isset($selectedValue))
        <div {{ $selectedValue->attributes->merge(['class' => 'absolute w-full cursor-pointer']) }}></div>
    @endif
    <div
        x-show="showOptions"
        x-cloak
        class="bg-base-200 border-base-100 double-select relative z-50 flex h-fit w-48 origin-top-left justify-stretch border-2 p-0 transition-transform transition-normal duration-200">
        @if (isset($leftSelect))
            <select {{ $leftSelect->attributes->merge([ 'class' => 'h-full w-full p-0 appearance-none border-0' ]) }}>
                {{ $leftSelect }}
            </select>
        @endif

        @if (isset($rightSelect))
            <select {{ $rightSelect->attributes->merge([ 'class' => 'h-full w-full p-0 appearance-none border-0' ]) }}>
                {{ $rightSelect }}
            </select>
        @endif
        {{-- <div class="absolute flex h-fit w-full">
            <div class="left-select-options"></div>
            <div class="right-select-options"></div>
        </div> --}}
    </div>
</div>

<style>
    .double-select {
        select {
            appearance: base-select;
        }
        option::checkmark {
            content: none;
        }
    }
</style>
