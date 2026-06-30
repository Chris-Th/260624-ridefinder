<?php

use Livewire\Component;
use Livewire\Attributes\Computed;
use App\Models\Ride;



new class extends Component
{
    #[Computed]
    public function rides()
    {
        return Ride::limit(20)->get();
    }
};
?>

<div class="container mx-auto h-full w-full text-base/6 grid grid-cols-[repeat(auto-fit,minmax(340px,1fr))] gap-6">

    @foreach ($this->rides as $ride)
        <livewire:ride.card :$ride />
    @endforeach

</div>
