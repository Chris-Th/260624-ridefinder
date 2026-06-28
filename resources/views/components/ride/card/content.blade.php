@props([
    'type' => '',
    'title' => '',
    'host' => '',
    'disc' => '',
    'pace' => '',
    'dist' => 0,
    'elevation' => 0,
    'date' => '',
    'time' => '',
    'place' => '',
    'imagesrc' => " Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png')",
    'isnodrop' => false,
    'isbeginner' => false,
    'isregroup' => false,
    'withcoffee' => false
])


<div class="row-span-1 col-span-4 underline decoration-dashed ">{{ $type }}</div>

<div class="row-span-1 col-span-6 flex justify-between items-start h-full -translate-y-1">
    <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex h-full items-center size-fit border-2-white/80 border-dotted border rounded-full">
        <x-vectors.nodrop @class([
            'rounded-full size-6  fill-blue-300',
            'hidden' => ! $isnodrop
        ]) class=""></x-vectors.nodrop>
    </div>
    <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex h-full items-center size-fit border-2-white/80 border-dotted border rounded-full">
        <x-vectors.2persons @class([
            'rounded-full size-6  fill-green-300',
            'hidden' => ! $isregroup
        ]) class=""></x-vectors.2persons>
    </div>
    <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex h-full items-center border-2-white/80 border-dotted border rounded-full size-6">
        <x-vectors.tricycle @class([
            'rounded-full size-5  fill-pink-200/0 border-2-pink-200',
            'hidden' => ! $isbeginner
        ]) class=""></x-vectors.tricycle>
    </div>
    <div class="shadow-white/20 shadow-firm-sm-inner bg-white/5 flex h-full items-center border-2-white/80 border-dotted border rounded-full size-6">
        <x-vectors.tricycle @class([
            'rounded-full size-5  fill-pink-200 border-2-pink-200',
            'hidden' => ! $withcoffee
        ]) class=""></x-vectors.tricycle>
    </div>
</div>

<div class="row-span-1 col-span-10"></div>

    <div class="row-span-3 col-span-4"></div>
    {{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}
<div class="col-span-6 row-span-3 text-base flex items-end justify-start border border-dashed shadow-white shadow-hard-md">
    <img class="object-fill object-left h-26" src="{{ $imagesrc }}"  alt="decorative image symbolizing {{ $type }}">
</div>

<div class="row-span-1 col-span-4"></div><div class="row-span-2 col-span-6 flex items-end font-bold text-2xl">{{ $title }}</div>

<div class="row-span-1 col-span-10"></div>

<div class="col-span-4">HOST</div><div class="col-span-6 italic">{{ $host }}</div>
<div class="col-span-4">TYPE</div><div class="col-span-6 italic">{{ $type }}</div>
<div class="col-span-4">DISC</div><div class="col-span-6 italic">{{ $disc }}</div>
<div class="col-span-4">PACE</div><div class="col-span-6 italic">{{ $pace }}</div>
<div class="col-span-4">DIST</div><div class="col-span-6 italic">{{ $dist }}</div>
<div class="col-span-4">ELEV</div><div class="col-span-6 italic">{{ $elevation }}</div>
<div class="col-span-4">DATE</div><div class="col-span-6 italic">{{ $date }}</div>
<div class="col-span-4">TIME</div><div class="col-span-6 italic">{{ $time }}</div>
<div class="col-span-4">MEET</div><div class="col-span-6 italic">{{ $place }}</div>

<div class="col-span-10"></div>
