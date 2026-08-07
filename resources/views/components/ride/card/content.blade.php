@props ([
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

<div class="col-span-4 row-span-1 underline decoration-dashed">{{ $type }}</div>

<div class="col-span-6 row-span-1 flex h-full -translate-y-1 items-start justify-between">
    <div
        class="shadow-firm-sm-inner border-2-white/80 flex size-fit h-full items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
        <x-vectors.nodrop
            @class([
            'rounded-full size-6  fill-blue-300',
            'hidden' => ! $isnodrop
        ])
            class=""></x-vectors.nodrop>
    </div>
    <div
        class="shadow-firm-sm-inner border-2-white/80 flex size-fit h-full items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
        <x-vectors.2persons
            @class([
            'rounded-full size-6  fill-green-300',
            'hidden' => ! $isregroup
        ])
            class=""></x-vectors.2persons>
    </div>
    <div
        class="shadow-firm-sm-inner border-2-white/80 flex size-6 h-full items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
        <x-vectors.tricycle-crossed
            @class([
            'rounded-full size-5  fill-pink-200/0 border-2-pink-200',
            'hidden' => ! $isbeginner
        ])
            class=""></x-vectors.tricycle-crossed>
    </div>
    <div
        class="shadow-firm-sm-inner border-2-white/80 flex size-6 h-full items-center rounded-full border border-dotted bg-white/5 shadow-white/20">
        <x-vectors.tricycle-crossed
            @class([
            'rounded-full size-5  fill-pink-200 border-2-pink-200',
            'hidden' => ! $withcoffee
        ])
            class=""></x-vectors.tricycle-crossed>
    </div>
</div>

<div class="col-span-10 row-span-1"></div>

<div class="col-span-4 row-span-3"></div>
{{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}
<div
    class="shadow-hard-md col-span-6 row-span-3 flex items-end justify-start border border-dashed text-base shadow-white">
    <img class="h-26 object-fill object-left" src="{{ $imagesrc }}" alt="decorative image symbolizing {{ $type }}" />
</div>

<div class="col-span-4 row-span-1"></div>
<div class="col-span-6 row-span-2 flex items-end text-2xl font-bold">{{ $title }}</div>

<div class="col-span-10 row-span-1"></div>

<div class="col-span-4">HOST</div>
<div class="col-span-6 italic">{{ $host }}</div>
<div class="col-span-4">TYPE</div>
<div class="col-span-6 italic">{{ $type }}</div>
<div class="col-span-4">DISC</div>
<div class="col-span-6 italic">{{ $disc }}</div>
<div class="col-span-4">PACE</div>
<div class="col-span-6 italic">{{ $pace }}</div>
<div class="col-span-4">DIST</div>
<div class="col-span-6 italic">{{ $dist }}</div>
<div class="col-span-4">ELEV</div>
<div class="col-span-6 italic">{{ $elevation }}</div>
<div class="col-span-4">DATE</div>
<div class="col-span-6 italic">{{ $date }}</div>
<div class="col-span-4">TIME</div>
<div class="col-span-6 italic">{{ $time }}</div>
<div class="col-span-4">MEET</div>
<div class="col-span-6 italic">{{ $place }}</div>

<div class="col-span-10"></div>
