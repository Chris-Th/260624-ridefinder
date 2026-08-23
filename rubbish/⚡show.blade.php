<?php

use App\Concerns\HasRideTagMotives;
use App\Concerns\HasRideTypeMotives;
use App\Models\Profile;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    use HasRideTagMotives, HasRideTypeMotives;

    public Profile $profile;
    // public $profilePhoto;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        // $this->rideTags = collect($this->profile->typicalRides()->rideTags()->pluck('name')->all());
        // $this->profilePhoto = $this->profile->getMedia('profile-photo');
    }

    #[Computed]
    public function profilePhoto()
    {
        return $this->profile->getMedia('profile-photo');
    }

    #[Computed]
    public function typicalRides()
    {
        return $this->profile->typicalRides;
    }

    public function getStampPath($rideTag)
    {
        return match ($rideTag) {
            'beginner-only' => '',
        };
    }

    public function addRowsForTags($typicalRide)
    {
        $count = $typicalRide->loadCount('rideTags')->ride_tags_count;
        // dump($count);
        $additionalRowsNumber = function ($count) {
            if ($count > 0 && $count <= 2) {
                return 2;
            }
            if ($count > 2 && $count <= 4) {
                return 4;
            }
            if ($count > 4 && $count <= 6) {
                return 6;
            }
            if ($count > 6) {
                return 8;
            }

            return 0;
        };

        return $additionalRowsNumber($count);

    }
};
?>

<div class="@container">
    <h2>{{ $profile->user->name }}</h2>

    {{ $this->profilePhoto }}

    <h3>Bio:</h3>
    <p>{{ $profile->bio }}</p>

    <h3>Location:</h3>
    <p>{{ $profile->location }}</p>

    <div class="h-full columns-sm gap-x-5 gap-y-3 border">
        @foreach ($this->typicalRides() as $typicalRide)
            <div
                x-data="{
                minRows: 10,
                rowHeight: 20,
                height: 0,
                init() {
                    this.height = (this.minRows + Number({{ $this->addRowsForTags($typicalRide) }})) * this.rowHeight;
                }
            }"
                {{-- x-bind:style="`height: ${height}px;`" --}}
                class="relative h-96 break-inside-avoid"
                wire:key="typicalRide-{{ $typicalRide->id }}">
                {{-- <x-vectors.filters.pergament-texture class="absolute z-0 size-full rounded-xl" /> --}}
                <x-typical-ride.card.skeletton
                    :rows="7 + $this->addRowsForTags($typicalRide)"
                    x-bind:row-height="`${rowHeight}px`"
                    cols="12"
                    rootclass="z-0 place-content-center h-full w-96 {{-- flacky-texture-bg-2 --}}  rounded-xl text-sm card-bg {{ $typicalRide?->rideType?->name }}"
                    class="grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-start! border-2 border-mist-700/40 text-start! font-bold text-white/70">
                    {{--  <div class="col-span-12"></div> --}}

                    <div class="col-span-12 grid grid-flow-col grid-cols-subgrid grid-rows-subgrid">
                        <div
                            class="border-y col-span-2 flex justify-center items-center w-full border-l border-{{ $typicalRide?->rideType?->name }}-800 px-1 text-{{ $typicalRide?->rideType?->name }}-300">
                            {{ sprintf('%03d', $loop->index) }}
                        </div>
                        {{-- <div
                            class="col-span-2 border-y border-{{ $typicalRide?->rideType?->name }}-800 bg-{{ $typicalRide?->rideType?->name }}-400/70"></div> --}}
                        <div
                            class="truncate text-nowrap uppercase col-span-10 flex justify-start items-center w-full border-y border-r border-{{ $typicalRide?->rideType?->name }}-800 bg-{{ $typicalRide?->rideType?->name }}-400/70 px-1 font-bold">
                            {{ $typicalRide->name }}
                        </div>
                    </div>
                    <div class="col-span-12"></div>

                    <div
                        style="grid-row: span {{ 4 + $this->addRowsForTags($typicalRide) }}"
                        class="col-span-12 grid grid-flow-row grid-cols-subgrid grid-rows-subgrid border-mist-700/40 bg-green-300/10">
                        @isset ($typicalRide?->rideType?->name)
                            <div class="col-span-4">TYPE</div>
                            <div class="col-span-8">{{ $typicalRide?->rideType?->name }}</div>
                        @endisset

                        @isset ($typicalRide?->pace?->name)
                            <div class="col-span-4">PACE</div>
                            <div class="col-span-8">{{ $typicalRide?->pace?->name }}</div>
                        @endisset

                        @isset ($typicalRide?->discipline?->name)
                            <div class="col-span-4">DISC</div>
                            <div class="col-span-8">{{ $typicalRide?->discipline?->name }}</div>
                        @endisset

                        @if ($typicalRide->max_distance || $typicalRide->min_distance)
                            <div class="col-span-4">DIST</div>

                            @if ( ($typicalRide->max_distance === $typicalRide->min_distance) && $typicalRide->max_distance != null)
                                <div class="col-span-8">{{ $typicalRide->max_distance }} Km</div>

                            @elseif ( $typicalRide->min_distance && $typicalRide->max_distance )
                                <div class="col-span-8">
                                    {{ $typicalRide->min_distance }} Km - {{ $typicalRide->max_distance }} Km
                                </div>

                            @elseif ( $typicalRide->min_distance )
                                <div class="col-span-8">{{ $typicalRide->min_distance }} Km or more</div>

                            @elseif ( $typicalRide->max_distance )
                                <div class="col-span-8">Up to {{ $typicalRide->max_distance }} Km</div>
                            @endif
                        @endif
                        <div class="col-span-12"></div>
                        @foreach ($typicalRide->rideTags as $tag)
                            <div class="relative col-span-2 row-span-2">
                                <x-vectors.stamps.ride-tag-stamp
                                    maxTransformX="6"
                                    maxTransformY="6"
                                    radius="16"
                                    show="true"
                                    :color="$this->getRideTagColor($tag->name)">
                                    <x-dynamic-component :component="'vectors.'.$tag->name" x-bind="icon" class="" />
                                </x-vectors.stamps.ride-tag-stamp>
                            </div>
                            <div class="col-span-4 row-span-2 flex items-center text-xs">{{ $tag->name }}</div>
                        @endforeach
                    </div>
                </x-typical-ride.card.skeletton>

                <x-vectors.filters.ink-grit-filter />
                <div
                    class="{{-- col-span-12 row-span-5 --}} absolute flex size-fit right-18 top-25 items-center justify-center border-2 border-mist-700/40 z-10">
                    <x-vectors.stamps.round-stamp
                        :color="$this->getRideTypeColorVar('400', $typicalRide?->rideType?->name)"
                        :ridetype="$typicalRide?->rideType?->name"
                        opacity="0.8"
                        class="absolute"
                        x-data="stamp({
                            opacity: 0.7,
                            radius: 45,
                            innerBorder: 1.5,
                            outerBorder: 5,
                            padding: 6,
                            maxJitter: 0.8,
                            // topText: '{{ $typicalRide->name }}',
                            centerText: '{{ $typicalRide?->discipline?->name }}',
                            // bottomText: '*{{ $typicalRide?->rideType?->name }}*',
                            font: {top: {size: 'sm', weight: 'bold'}, center: {size: 'md', weight: 'normal'}, bottom:{size: 'lg', weight: 'thin'}},
                            maxTransform: { tx: 15, ty: 20, rot: 30 },
                            iconFilter: 'soft',
                        })">
                        <x-dynamic-component
                            uniqueid="typical-ride-{{ $typicalRide->id }}"
                            :component="$this->getRideTypeMotivePath($typicalRide?->rideType?->name)"
                            x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]  scale-140 origin-center`"
                            x-bind:x="iconRect.x"
                            x-bind:y="iconRect.y"
                            x-bind:width="iconRect.width"
                            x-bind:height="iconRect.height"
                            class="mt-4" />
                    </x-vectors.stamps.round-stamp>
                </div>
            </div>

        @endforeach
    </div>
</div>
