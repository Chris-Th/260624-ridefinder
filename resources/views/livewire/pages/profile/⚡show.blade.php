<?php

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public User $user;

    #[Computed]
    public function profile()
    {
        return $this->user->profile;
    }
};
?>

<div>
    <h2>{{ $user->name }}</h2>

    <h3>Bio:</h3>
    <p>{{ $this->profile->bio }}</p>
</div>
