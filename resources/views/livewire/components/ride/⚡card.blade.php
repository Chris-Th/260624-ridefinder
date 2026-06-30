<?php

use Livewire\Component;
use App\Models\Ride;
use Livewire\Attributes\Computed;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

new class extends Component
{

    public $ride;

    public function mount()
    {

    }

    #[Computed]
    public function meetsOnDate()
    {
         return Str::of($this->ride->meets_at)->split('/[\s ]+/')[0];
    }

    #[Computed]
    public function meetsAtTime()
    {
         return Str::of($this->ride->meets_at)->split('/[\s ]+/')[1];
    }

    #[Computed]
    public function meetsAtPlace()
    {
        return Str::of($this->ride->meeting_point_address)->split('/[\s ]+/')[3];
    }

    #[Computed]
    public function rideImgSrc()
    {
        switch($this->ride->rideType->name)
        {
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

<x-ride.card.skeletton rootclass="py-1 " class="text-start! place-content-start! grid grid-flow-row grid-cols-subgrid grid-rows-subgrid uppercase">

   {{--  <div class="row-span-1 col-span-4 underline decoration-dashed ">{{ $ride->rideType->name }}</div> --}}


   <div class="col-span-4 row-span-3 flex items-center justify-center border border-dashed border-gray-600 text-xs text-gray-400 relative overflow-visible max-h-28">
        {{-- <img class="object-fill object-left h-26 align-middle flex items-center justify-center size-full" src="{{ $this->rideImgSrc }}"  alt="Illustration of {{ $ride->rideType?->name }}"> --}}

        <x-vectors.stamps.stamp class="abslute rotate-12 -translate-y-3" x-data="stamp({ radius: 60, maxJitter: 0.8, upperText: '{{ $ride->rideType?->name }}', middleText: '{{ $this->meetsOnDate }}', bottomText: '* {{ $ride->distance_km }} *' })" />
    </div>

    <div class="row-span-1 col-span-1"></div>
    <div class="row-span-1 col-span-5 flex justify-between items-start h-full -translate-y-1">
        <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex items-center size-fit border-2-white/80 border-dotted border rounded-full aspect-1">
            <x-vectors.nodrop @class([
                'rounded-full size-6  fill-blue-300 aspect-1',
                'opacity-0' => $ride->no_drop == '0'
            ]) class=""></x-vectors.nodrop>
        </div>
        <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex items-center size-fit border-2-white/80 border-dotted border rounded-full aspect-1">
            <x-vectors.2persons @class([
                'rounded-full size-6  fill-green-300 aspect-1',
                'opacity-0' => $ride->regroup_at_climbs == '0'
            ]) class=""></x-vectors.2persons>
        </div>
        <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex items-center border-2-white/80 border-dotted border rounded-full size-6 aspect-1">
            <x-vectors.tricycle @class([
                'rounded-full size-5  fill-pink-200 border-2-pink-200 aspect-1',
                'opacity-0' => $ride->beginner_friendly == '0'
            ]) class=""></x-vectors.tricycle>
        </div>
        <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex items-center border-2-white/80 border-dotted border rounded-full h-6 w-7 aspect-1">
            <x-vectors.coffeecup  @class([
                'rounded-full w-8 h-6  fill-yellow-400 border-2-yellow-400 scale-x-150',
                'opacity-0' => $ride->coffee_stop == '0'
            ]) class=""></x-vectors.coffeecup>
        </div>
    </div>







         <div class="row-span-2 col-span-10"></div>



           {{-- <div class="row-span-1 col-span-4"></div> --}}
        {{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}



    <div class="row-span-2 col-span-10 flex items-end font-bold text-lg underline decoration-dashed">{{ $ride->title }}</div>

    <div class="row-span-1 col-span-10"></div>

    <div class="col-span-4">HOST</div><div class="col-span-6 italic">Hans-Ruedi</div>
    <div class="col-span-4">TYPE</div><div class="col-span-6 italic">{{ $ride->rideType?->name }}</div>
    <div class="col-span-4">DISC</div><div class="col-span-6 italic cap">{{ $ride->discipline?->name }}</div>
    <div class="col-span-4">PACE</div><div class="col-span-6 italic">{{ $ride->pace->name }}</div>
    <div class="col-span-4">DIST</div><div class="col-span-6 italic">{{ $ride->distance_km }}</div>
    <div class="col-span-4">ELEV</div><div class="col-span-6 italic">{{ $ride->elevation_m }}</div>
    <div class="col-span-4">SIZE</div><div class="col-span-6 italic">{{ $ride->max_riders }}</div>
    <div class="col-span-4">DATE</div><div class="col-span-6 italic">{{ $this->meetsOnDate }}</div>
    <div class="col-span-4">TIME</div><div class="col-span-6 italic">{{ $this->meetsAtTime }}</div>
    <div class="col-span-4">MEET</div><div class="col-span-6 italic">{{ $this->meetsAtPlace }}</div>

    <div class="col-span-10"></div>

</x-ride.card.skeletton>
