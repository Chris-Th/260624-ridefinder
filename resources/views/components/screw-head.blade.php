<div
    x-bind:style="
        `transform: rotate(${Math.random() * 360}deg) translateX(${Math.random() * 8 - 4}px) translateY(${Math.random() * 8 - 4}px)`
    "
    {{ $attributes->merge([ 'class' => 'screw-head bg-mist-700 absolute z-30 flex size-3 gap-0.5 rounded-full' ]) }}>
    <div class="basis-full rounded-l-full bg-mist-900"></div>
    <div class="basis-full rounded-r-full bg-mist-900"></div>
</div>
