<?php

use App\Models\Profile;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public Profile $profile;
    // public $profilePhoto;

    public function mount(Profile $profile)
    {
        $this->profile = $profile;
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
};
?>

<div>
    <h2>{{ $profile->user->name }}</h2>

    {{ $this->profilePhoto }}

    <h3>Bio:</h3>
    <p>{{ $profile->bio }}</p>

    <h3>Location:</h3>
    <p>{{ $profile->location }}</p>

    @foreach ($this->typicalRides as $typicalRide)
        <div wire:key="typicalRide-{{ $typicalRide->id }}">
            <h3>{{ $typicalRide->name }}</h3>
            <ul>
                <li>{{ $typicalRide->discipline->name }}</li>
            </ul>
        </div>
    @endforeach
</div>
