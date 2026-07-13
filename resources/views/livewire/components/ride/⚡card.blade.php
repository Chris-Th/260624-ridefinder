<?php

use App\Models\Ride;
use App\Models\RideType;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public Ride $ride;

    public string $rideType = '';

    public string $rideTypeHsl = '';

    public string $rideTypeHslTw = '';

    public function mount()
    {
        $this->rideType = $this->ride->rideType?->name;
        $this->rideTypeHsl = $this->getRideTypeHSL($this->rideType, 'dark', false);
        $this->rideTypeHslTw = $this->getRideTypeHSL($this->rideType, 'dark', true);
    }

    #[Computed]
    public function listItems()
    {
        return collect([
            'HOST' => 'HANS-RUEDI',
            'TYPE' => $this->rideType,
            'DISC' => $this->ride->discipline?->name,
            'PACE' => $this->ride->pace?->name,
            'DIST' => $this->ride->distance_km,
            'ELEV' => $this->ride->elevation_m,
            'SIZE' => $this->ride->max_riders,
            'DATE' => $this->meetsOnDate(),
            'TIME' => $this->meetsAtTime(),
            'MEET' => $this->meetsAtPlace(),
        ]);
    }

    #[Computed]
    public function rideTypeMotive()
    {
        // 'Coffee Ride', 'Training', 'Climbing', 'Scenic Ride', 'Endurance', 'Bikepacking'
        // Climbing, Gravel, Coffee Ride, Social, Bikepacking, Endurance, XC / Trails, Adventure
        switch ($this->ride->rideType?->name) {
            case 'Coffee Ride':
                return 'vectors.stamps.ride-type-motives.coffee';
            case 'Climbing':
                return 'vectors.stamps.ride-type-motives.climbing';
            case 'Family Ride':
                return 'vectors.stamps.ride-type-motives.family';
            case 'Social':
                return 'vectors.stamps.ride-type-motives.social';
            case 'Bikepacking':
                return 'vectors.stamps.ride-type-motives.bikepacking';
            case 'Endurance':
                return 'vectors.stamps.ride-type-motives.endurance';
            case 'Adventure':
                return 'vectors.stamps.ride-type-motives.adventure';
            case 'Trails':
                return 'vectors.stamps.ride-type-motives.trails';
            case 'Paceline':
                return 'vectors.stamps.ride-type-motives.paceline';
            default:
                return 'vectors.stamps.ride-type-motives.default';
        }

        return RideType::pluck('icon_view_component')
            ->filter(fn ($value) => $value == $this->ride->rideType['icon_view_component'])
            ->first();
    }

    public function getRideTypeHSL($rideType = 'default', $mode = 'dark', $isTailwind = true)
    {
        $rideType = Str::before(Str::lcfirst($rideType), ' ');
        // [hue, sat, [lum light mode, lum dark mode]]
        $hsl = [
            'adventure' => ['28', '100%', ['46%', '75%']],
            'bikepacking' => ['72', '100%', ['34%', '65%']],
            'climbing' => ['357', '100%', ['42%', '75%']],
            'endurance' => ['215', '100%', ['40%', '85%']],
            'coffee' => ['27', '100%', ['31%', '56%']],
            'family' => ['95', '100%', ['51%', '62%']],
            'paceline' => ['70', '100%', ['48%', '70%']],
            'social' => ['269', '100%', ['48%', '80%']],
            'trails' => ['168', '100%', ['24%', '60%']],
            'default' => ['0', '0%', ['35%', '65%']],
        ];

        if ($mode === 'dark') {
            return $isTailwind
                ? $hsl[$rideType][0].'_'.$hsl[$rideType][1].'_'.$hsl[$rideType][2][1]
                : $hsl[$rideType][0].' '.$hsl[$rideType][1].' '.$hsl[$rideType][2][1];
        } else {
            return $isTailwind
                ? $hsl[$rideType][0].'_'.$hsl[$rideType][1].'_'.$hsl[$rideType][2][0]
                : $hsl[$rideType][0].' '.$hsl[$rideType][1].' '.$hsl[$rideType][2][0];
        }

        /*  $hsl = [
             'adventure' => '28',
             'bikepacking' => '72',
             'climbing' => '357',
             'endurance' => '215',
             'coffee' => '27',
             'family' => '95',
             'paceline' => '70',
             'social' => '269',
             'trails' => '168',
             'default' =>'0'
         ];
         return $hsl[$rideType]; */
    }

    protected function meetsOnDate(): string
    {
        return Str::of($this->ride->meets_at)->split('/[\s ]+/')[0];
    }

    protected function meetsAtTime(): string
    {
        return Str::of($this->ride->meets_at)->split('/[\s ]+/')[1];
    }

    protected function meetsAtPlace(): string
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

<x-ride.card.skeletton
    rootclass="place-content-center"
    class="grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-start! text-start! uppercase"
>
    <div class="col-span-10 row-span-1"></div>

    <div
        class="bg-base-300 relative col-span-4 row-span-3 flex items-center justify-center overflow-visible border border-dashed border-gray-600 text-xs text-gray-400"
    >
        {{-- <img class="object-fill object-left h-26 align-middle flex items-center justify-center size-full" src="{{ $this->rideImgSrc }}"  alt="Illustration of {{ $ride->rideType?->name }}">  --}}

        <x-vectors.stamps.stamp
            :color="$rideTypeHsl"
            class="absolute text-[color:hsl({{ $rideTypeHslTw }})] mix-blend-lighten"
            x-data="stamp({
            radius: 70,
            maxJitter: 0.6,
            upperText: '{{ $this->listItems['TYPE'] }}',
            middleText: '{{ $this->listItems['DISC'] }}',
            bottomText: '* {{ $this->listItems['DATE'] }} *',
            maxTransform: { tx: 20, ty: 20, rot: 30 },
        })"
        >
            <x-dynamic-component
                uniqueid="{{ $ride->id }}"
                :component="$this->rideTypeMotive"
                x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]`"
                x-bind:style=" '{{ $this->rideType }}' == 'Climbing' ? 'vector-effect: non-scaling-stroke; stroke-width: 1; fill-opacity: 1'
                    : '{{ $this->rideType }}' == 'Endurance' ? 'stroke-width: 0.25; fill-opacity: 0.5;' : ''"
                x-bind:x="iconRect.x"
                x-bind:y="iconRect.y"
                x-bind:width="iconRect.width"
                x-bind:height="iconRect.height"
                class="mt-4"
            />
        </x-vectors.stamps.stamp>
    </div>

    <div class="col-span-1 row-span-1"></div>
    <div class="col-span-5 row-span-1 flex h-full -translate-y-1 items-start justify-between">
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center rounded-full border border-dotted bg-white/5 shadow-white/20"
        >
            <x-vectors.nodrop
                @class([
                'rounded-full size-6  fill-blue-300 aspect-1',
                'opacity-0' => $ride->no_drop == '0',
            ])
                class=""
            ></x-vectors.nodrop>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center rounded-full border border-dotted bg-white/5 shadow-white/20"
        >
            <x-vectors.2persons
                @class([
                'rounded-full size-6  fill-green-300 aspect-1',
                'opacity-0' => $ride->regroup_at_climbs == '0',
            ])
                class=""
            ></x-vectors.2persons>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-6 items-center rounded-full border border-dotted bg-white/5 shadow-white/20"
        >
            <x-vectors.tricycle
                @class([
                'rounded-full size-5  fill-pink-200 border-2-pink-200 aspect-1',
                'opacity-0' => $ride->beginner_friendly == '0',
            ])
                class=""
            ></x-vectors.tricycle>
        </div>
        <div
            class="shadow-firm-sm-inner border-2-white/80 aspect-1 flex h-6 w-7 items-center rounded-full border border-dotted bg-white/5 shadow-white/20"
        >
            <x-vectors.coffeecup
                @class([
                'rounded-full w-8 h-6  fill-yellow-400 border-2-yellow-400 scale-x-150',
                'opacity-0' => $ride->coffee_stop == '0',
            ])
                class=""
            ></x-vectors.coffeecup>
        </div>
    </div>

    <div class="col-span-10 row-span-1"></div>

    {{-- <div class="row-span-1 col-span-4"></div> --}}
    {{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}

    <div class="col-span-10 row-span-2 flex items-end text-lg font-bold underline decoration-dashed">
        {{ $ride->title }}
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
