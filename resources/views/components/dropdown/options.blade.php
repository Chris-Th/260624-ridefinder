<ul x-show="showOptions" {{ $attributes->merge([ 'class' => 'absolute w-full z-50' ]) }}>
    @if ($slot->isEmpty())
        <template x-for="option in options">
            <li x-text="option.name" class="odd:bg-base-300 even:bg-base-200 h-10 w-full"></li>
        </template>
    @else
        {{ $slot }}
    @endif
</ul>
