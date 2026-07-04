<?php

use Livewire\Component;
use App\Models\Ride;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

new class extends Component {
    public RIDE $ride;

     #[Computed]
    public function listItems()
    {
        return collect([
            'HOST' => 'HANS-RUEDI',
            'TYPE' => $this->ride->rideType?->name,
            'DISC' => $this->ride->discipline?->name,
            'PACE' => $this->ride->pace?->name,
            'DIST' => $this->ride->distance_km,
            'ELEV' => $this->ride->elevation_m,
            'SIZE' => $this->ride->max_riders,
            'DATE' => $this->meetsOnDate(),
            'TIME' => $this->meetsAtTime(),
            'MEET' => $this->meetsAtPlace()
        ]);
    }

    protected function meetsOnDate():string
    {
        return Str::of($this->ride->meets_at)->split('/[\s ]+/')[0];
    }

    protected function meetsAtTime():string
    {
        return Str::of($this->ride->meets_at)->split('/[\s ]+/')[1];
    }

    protected function meetsAtPlace():string
    {
        return Str::of($this->ride->meeting_point_address)->split('/[\s ]+/')[3];
    }

    #[Computed]
    public function rideImgSrc()
    {
        switch ($this->ride->rideType->name) {
            case 'Training':
                return Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png');
            case 'Climbing':
                return Storage::url('public/ridetypeimages/bike-climbing-mountain.png');
            default:
                return '';
        }
    }
};
?>

<x-ride.card.skeletton rootclass="place-content-center"
    class="text-start! place-content-start! grid grid-flow-row grid-cols-subgrid grid-rows-subgrid uppercase">

     <div class="col-span-10 row-span-1"></div>

    <div
        class="relative col-span-4 row-span-3 flex items-center justify-center overflow-visible border border-dashed border-gray-600 text-xs text-gray-400 bg-base-300">
        {{-- <img class="object-fill object-left h-26 align-middle flex items-center justify-center size-full" src="{{ $this->rideImgSrc }}"  alt="Illustration of {{ $ride->rideType?->name }}"> --}}

        <div x-data="stampTransforms" x-init="randomizeTransforms">
             <x-vectors.stamps.stamp class="text-purple-400" x-data="stamp({ radius: 60, maxJitter: 0.8, upperText: '{{ $this->listItems['TYPE'] }}', middleText: '{{ $this->listItems['DATE'] }}', bottomText: '* {{ $this->listItems['DISC'] }} *' })"  />
        </div>

    </div>

    <div class="col-span-1 row-span-1"></div>
    <div class="col-span-5 row-span-1 flex h-full -translate-y-1 items-start justify-between">
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
            <x-vectors.nodrop @class([
                'rounded-full size-6  fill-blue-300 aspect-1',
                'opacity-0' => $ride->no_drop == '0',
            ]) class=""></x-vectors.nodrop>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
            <x-vectors.2persons @class([
                'rounded-full size-6  fill-green-300 aspect-1',
                'opacity-0' => $ride->regroup_at_climbs == '0',
            ]) class=""></x-vectors.2persons>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-6 items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
            <x-vectors.tricycle @class([
                'rounded-full size-5  fill-pink-200 border-2-pink-200 aspect-1',
                'opacity-0' => $ride->beginner_friendly == '0',
            ]) class=""></x-vectors.tricycle>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex h-6 w-7 items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
            <x-vectors.coffeecup @class([
                'rounded-full w-8 h-6  fill-yellow-400 border-2-yellow-400 scale-x-150',
                'opacity-0' => $ride->coffee_stop == '0',
            ]) class=""></x-vectors.coffeecup>
        </div>
    </div>

    <div class="col-span-10 row-span-1"></div>

    {{-- <div class="row-span-1 col-span-4"></div> --}}
    {{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}

    <div class="col-span-10 row-span-2 flex items-end text-lg font-bold underline decoration-dashed">{{ $ride->title }}
    </div>

    <div class="col-span-10 row-span-1"></div>

    @foreach ($this->listItems as $key => $value)
        <div class="col-span-4 flex items-end">{{ $key }}</div>
        <div class="col-span-4 flex items-end">{{ $value }}</div>
    @endforeach
{{--
    <div class="col-span-4 flex items-end">HOST</div>
    <div class="col-span-6 italic">Hans-Ruedi</div>
    <div class="col-span-4">TYPE</div>
    <div class="col-span-6 italic">{{ $ride->rideType?->name }}</div>
    <div class="col-span-4">DISC</div>
    <div class="cap col-span-6 italic">{{ $ride->discipline?->name }}</div>
    <div class="col-span-4">PACE</div>
    <div class="col-span-6 italic">{{ $ride->pace->name }}</div>
    <div class="col-span-4">DIST</div>
    <div class="col-span-6 italic">{{ $ride->distance_km }}</div>
    <div class="col-span-4">ELEV</div>
    <div class="col-span-6 italic">{{ $ride->elevation_m }}</div>
    <div class="col-span-4">SIZE</div>
    <div class="col-span-6 italic">{{ $ride->max_riders }}</div>
    <div class="col-span-4">DATE</div>
    <div class="col-span-6 italic">{{ $this->meetsOnDate }}</div>
    <div class="col-span-4">TIME</div>
    <div class="col-span-6 italic">{{ $this->meetsAtTime }}</div>
    <div class="col-span-4">MEET</div>
    <div class="col-span-6 italic">{{ $this->meetsAtPlace }}</div> --}}

    <div class="col-span-10"></div>

</x-ride.card.skeletton>
