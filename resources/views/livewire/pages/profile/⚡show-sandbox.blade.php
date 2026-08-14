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
    <div class="grid h-full gap-x-5 gap-y-3 border p-2 sm:grid-cols-2 lg:grid-cols-3">
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
        <x-typical-ride.card.skeletton-sandbox></x-typical-ride.card.skeletton-sandbox>
    </div>
</div>
