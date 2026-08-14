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

<div class="@container text-sm text-base-content">
    {{-- <div class="grid h-full items-center gap-x-5 gap-y-3 md:grid-cols-2 xl:grid-cols-3"> --}}
    <div class="h-full columns-3xs items-center gap-8">
        @foreach ($this->typicalRides() as $typicalRide)
            <div class="relative">
                <x-vectors.filters.pergament-texture class="absolute z-0 size-full rounded-xl" />
                <x-typical-ride.card.skeletton-sandbox
                    class="mb-5 break-inside-avoid"
                    :rows="7 + $this->addRowsForTags($typicalRide)">
                    <x-typical-ride.card.content :index="$loop->index + 1" :$typicalRide></x-typical-ride.card.content>
                </x-typical-ride.card.skeletton-sandbox>
            </div>

        @endforeach

        <x-typical-ride.card.skeletton-sandbox
            class="mb-5 break-inside-avoid"
            :rows="10"></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox
            class="mb-5 break-inside-avoid"
            :rows="6"></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox
            class="mb-5 break-inside-avoid"
            :rows="12"></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox class="mb-5 break-inside-avoid"></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox class="mb-5 break-inside-avoid"></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox class="mb-5 break-inside-avoid"></x-typical-ride.card.skeletton-sandbox>
    </div>
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
            box-shadow: 0 0 6px 1px var(--color-base-content);
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

            .index {
                grid-column: 1 / 3;
            }
            .ride-type {
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
    }
</style>
