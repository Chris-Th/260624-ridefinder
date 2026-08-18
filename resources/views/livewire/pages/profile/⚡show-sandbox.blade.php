<?php

use App\Concerns\HasRideTagMotives;
use App\Concerns\HasRideTypeMotives;
use App\Models\Profile;
use App\Models\RideType;
use App\Models\TypicalRide;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Json;
use Livewire\Component;

new class extends Component
{
    use HasRideTagMotives, HasRideTypeMotives;

    public Profile $profile;

    public $typicalRides = [];

    public $selectedRideType = []; // ['typical_ride_id' => 1, 'ride_type_id' => 1]
    // public $profilePhoto;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
        $this->typicalRides = $this->profile->typicalRides;
        // $this->rideTags = collect($this->profile->typicalRides()->rideTags()->pluck('name')->all());
        // $this->profilePhoto = $this->profile->getMedia('profile-photo');
    }

    #[Computed]
    public function profilePhoto()
    {
        return $this->profile->getFirstMedia('profile-photo');
    }

    #[Computed]
    public function getTypicalRides()
    {
        return $this->profile->typicalRides;
    }

    public function getRandomAngle()
    {
        return rand(0, 359);
    }

    public function getRandomTurbulenceSeed()
    {
        return rand(1, 1000);
    }

    public function updateTypicalRideRelation(string $relation, $typicalRideId, $relationId)
    {
        // in blade: updateTypicalRideRelation('{{ \App\Models\RideType::class }}', $typicalRideId, $relationId)
        // if (!is_subclass_of($modelClass, \Illuminate\Database\Eloquent\Model::class)) {
        //     throw new \InvalidArgumentException('Invalid model class');
        // }
        $typicalRide = TypicalRide::find($typicalRideId);

        $column = $relation.'_id';

        $typicalRide->update([$column => $relationId]);
    }

    #[Json]
    public function rideTypesJson()
    {
        return RideType::all(['id', 'name', 'icon_view_component']);
    }

    #[Computed]
    public function rideTypes()
    {
        return RideType::all(['id', 'name', 'icon_view_component']);
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

<div class="text-base-content mx-auto h-dvh max-w-4xl text-sm">
    <x-vectors.filters.textures.factory>
        @foreach ($typicalRides as $typicalRide)
            <x-vectors.filters.textures.primitives.metal-plate-1 :id="'texture-1-'.$typicalRide->id" />
        @endforeach
    </x-vectors.filters.textures.factory>
    {{-- <x-vectors.filters.textures.primitives.ink-grit-2 id="ink-grit-filter" />
    <x-vectors.filters.textures.primitives.ink-grit-2 id="softer-ink-grit-filter" /> --}}
    <x-vectors.filters.ink-grit-filter />

    <div class="mx-auto flex h-full w-full flex-col justify-start gap-8">
        {{ $this->profilePhoto()->img()->attributes([ 'class' => 'max-w-64 rounded-full border border-mist-800 mx-auto' ]) }}
        <div class="flex h-full flex-col gap-6">
            <div class="mx-4">
                <h4 class="mb-4 text-lg font-bold italic">Name:</h4>
                <p>{{ $profile->user->name }}</p>
            </div>
            <div class="mx-4">
                <h4 class="mb-4 text-lg font-bold italic">Bio:</h4>
                <p>{{ $profile->bio }}</p>
            </div>

            <h4 class="ms-4 mb-4 text-lg font-bold italic">Typical Rides:</h4>
            <div class="mx-auto h-full! w-full columns-[12rem] items-center gap-8">
                @foreach ($typicalRides as $typicalRide)
                    <div
                        x-data="{
                            viewBox: '',
                            rect: null,
                            init() {
                                this.$watch('rect', (r) => {
                                    this.viewBox = `${r.x} ${r.y} ${r.width} ${r.height}`;
                                });
                            }
                        }"
                        class="relative min-w-fit break-inside-avoid data-loading:h-48!">
                        {{--  <x-vectors.filters.pergament-texture class="absolute size-full rounded-xl data-loading:h-50!" /> --}}
                        <x-vectors.filters.textures.el
                            class="absolute size-full rounded-xl data-loading:h-50!"
                            :opacity="0.35"
                            :id="'texture-1-'.$typicalRide->id" />
                        <x-typical-ride.card.skeletton-sandbox
                            class="typicalride-card mb-5 w-full inset-shadow-sm inset-shadow-mist-500 data-loading:h-50!"
                            x-init="rect = $el.getBoundingClientRect()"
                            :row-gap="8"
                            :row-height="16"
                            :min-col-width="16"
                            :ride-tags-count="$typicalRide->loadCount('rideTags')->ride_tags_count">
                            <x-typical-ride.card.content :iteration="$loop->iteration" :$typicalRide>
                                <x-typical-ride.card.ride-tags :ride-tags="$typicalRide->rideTags" />
                                {{--  <x-vectors.filters.ink-grit-filter /> --}}
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
                                                innerBorder: 1,
                                                outerBorder: 3,
                                                borderGap: 1.5,
                                                smearFactor: 1.5,
                                                padding: 6,
                                                maxJitter: 0.8,
                                                // topText: '{{ $typicalRide->name }}',
                                                centerText: '{{ $typicalRide?->discipline?->name }}',
                                                // bottomText: '*{{ $typicalRide?->rideType?->name }}*',
                                                font: {top: {size: 'sm', weight: 'bold'}, center: {size: 'md', weight: 'normal'}, bottom:{size: 'lg', weight: 'thin'}},
                                                maxTransform: { tx: 15, ty: 20, rot: 90 },
                                                iconFilter: 'soft',
                                            })">
                                        <x-dynamic-component
                                            uniqueid="typical-ride-{{ $typicalRide->id }}"
                                            :component="$this->getRideTypeMotivePath($typicalRide?->rideType?->name)"
                                            x-bind:class="
                                                `w-[${iconRect.width}px] h-[${iconRect.height}px]  scale-140 origin-center`
                                            "
                                            x-bind:x="iconRect.x"
                                            x-bind:y="iconRect.y"
                                            x-bind:width="iconRect.width"
                                            x-bind:height="iconRect.height"
                                            class="mt-4" />
                                        </x-vectors.stamps.stamp-mask>
                                </div>
                            </x-typical-ride.card.content>
                        </x-typical-ride.card.skeletton-sandbox>
                    </div>

                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="grid h-full items-center gap-x-5 gap-y-3 md:grid-cols-2 xl:grid-cols-3"> --}}
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
