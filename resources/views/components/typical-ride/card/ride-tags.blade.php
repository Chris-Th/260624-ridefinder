@props ([ 'rideTags' => [] ])

@isset ($rideTags[0]->name)
    <div class="full-row"></div>
    @foreach ($rideTags as $tag)
        <div class="ride-tag text-nowrap">
            <div class="stamp">
                <x-vectors.stamps.ride-tag-stamp
                    color="oklch(0.62 0.08 280)"
                    {{-- color="oklch(0.7 0.08 262)" --}}
                    maxTransformX="8"
                    maxTransformY="6"
                    radius="14"
                    show="true">
                    <x-dynamic-component :component="'vectors.'.$tag->name" x-bind="icon" class="" />
                </x-vectors.stamps.ride-tag-stamp>
                <div class="spacer"></div>
            </div>
            <div class="tag text-xs">{{ $tag->name }}</div>
        </div>
    @endforeach
@endisset
