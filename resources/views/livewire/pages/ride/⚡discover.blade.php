<?php

use App\Models\Ride;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    #[Computed]
    public function rides()
    {
        return Ride::with('rideTags')->limit(30)->get();
    }
};
?>

<div
    x-cloak
    x-data
    class="container mx-auto grid h-full w-fit grid-cols-[repeat(auto-fill,minmax(320px,1fr))] items-center justify-center gap-6 text-base/6">
    @foreach ($this->rides as $ride)
        <livewire:ride.card :$ride :$loop />
    @endforeach

    {{-- svg filter available in entire component (used on ink stamps) --}}
    <x-vectors.filters.ink-grit-filter />

    <svg class="size-0 opacity-15">
        <filter id="roughpaper">
            <feTurbulence type="fractalNoise" baseFrequency="0.04" result="noise" numOctaves="5" />

            <feDiffuseLighting in="noise" lighting-color="#99999944" surfaceScale="2">
                <feDistantLight azimuth="45" elevation="60" />
            </feDiffuseLighting>
        </filter>
    </svg>
</div>
