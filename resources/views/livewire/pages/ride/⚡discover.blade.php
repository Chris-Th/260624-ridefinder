<?php

use App\Models\Ride;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function rides()
    {
        return Ride::limit(30)->get();
    }
};
?>

<div
    x-data
    class="container mx-auto grid h-full w-fit grid-cols-[repeat(auto-fill,minmax(320px,1fr))] items-center justify-center gap-6 text-base/6">
    @foreach ($this->rides as $ride)
        <livewire:ride.card :$ride />
    @endforeach

    {{-- svg filter available in entire component (used on ink stamps) --}}
    <x-vectors.filters.ink-grit-filter />
</div>
