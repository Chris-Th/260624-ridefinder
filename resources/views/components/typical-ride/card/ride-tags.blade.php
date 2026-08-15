@props ([ 'rideTags' => [] ])

@isset ($rideTags[0]->name)
    <div class="full-row"></div>
    @foreach ($rideTags as $tag)
        <div class="ride-tag text-nowrap">
            <div class="stamp">
                <x-vectors.stamps.ride-tag-stamp
                    maxTransformX="8"
                    maxTransformY="6"
                    radius="14"
                    show="true"
                    x-bind:color="getRideTagColor($tag->name)">
                    <x-dynamic-component :component="'vectors.'.$tag->name" x-bind="icon" class="" />
                </x-vectors.stamps.ride-tag-stamp>
                <div class="spacer"></div>
            </div>
            <div class="tag text-xs">{{ $tag->name }}</div>
        </div>
    @endforeach
@endisset
