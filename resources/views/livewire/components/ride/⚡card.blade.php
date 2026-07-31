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

    public $index;

    public function mount($loop)
    {
        $this->index = sprintf('%03d', $loop->index);
        $this->rideType = $this->ride->rideType?->name;
    }

    #[Computed]
    public function rideStats()
    {
        return collect([
            'HOST' => $this->ride->host?->name,
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

    public function getRideTypeColorVar($lightness = '500'): string
    {
        $rideType = Str::before(Str::lcfirst($this->rideType ?? ''), ' ');

        /* return $rideType
            ? "var(--color-{$rideType}-{$lightness})"
            : "var(--color-neutral-500)"; */

        /* return match ($rideType) {
            'adventure' => '--color-adventure-' . $lightness,
            'bikepacking' => '--color-bikepacking-' . $lightness,
            'climbing' => '--color-climbing-' . $lightness,
            'endurance' => '--color-endurance-' . $lightness,
            'coffee' => '--color-coffee-' . $lightness,
            'family' => '--color-family-' . $lightness,
            'paceline' => '--color-paceline-' . $lightness,
            'social' => '--color-social-' . $lightness,
            'trails' => '--color-trails-' . $lightness,
            default => '--color-neutral-' . $lightness,
        }; */

        return match ($rideType) {
            'adventure' => "var(--color-adventure-$lightness)",
            'bikepacking' => "var(--color-bikepacking-$lightness)",
            'climbing' => "var(--color-climbing-$lightness)",
            'endurance' => "var(--color-endurance-$lightness)",
            'coffee' => "var(--color-coffee-$lightness)",
            'family' => "var(--color-family-$lightness)",
            'paceline' => "var(--color-paceline-$lightness)",
            'social' => "var(--color-social-$lightness)",
            'trails' => "var(--color-trails-$lightness)",
            default => "var(--color-neutral-$lightness)",
        };

    }

    /* public function getBGColor($rideType, $opacity = '30')
    {
        return match ($rideType) {
            'adventure' => 'bg-adventure-300/'.$opacity,
            'coffee' => 'bg-coffee-300/'.$opacity,
            'trails' => 'bg-trails-300/'.$opacity,
            'climbing' => 'bg-climbing-300/'.$opacity,
            'social' => 'bg-social-300/'.$opacity,
            'endurance' => 'bg-endurance-300/'.$opacity,
            'bikepacking' => 'bg-bikepacking-300/'.$opacity,
            'paceline' => 'bg-paceline-300/'.$opacity,
            'family' => 'bg-family-300/'.$opacity,
            default => 'bg-neutral-300/'.$opacity,
        };
    } */

    public function getBGColor($rideType)
    {
        return match ($rideType) {
            'adventure' => 'bg-adventure-300',
            'coffee' => 'bg-coffee-300',
            'trails' => 'bg-trails-300',
            'climbing' => 'bg-climbing-300',
            'social' => 'bg-social-300',
            'endurance' => 'bg-endurance-300',
            'bikepacking' => 'bg-bikepacking-300',
            'paceline' => 'bg-paceline-300',
            'family' => 'bg-family-300',
            default => 'bg-neutral-300',
        };
    }

    #[Computed]
    public function rideTypeMotive()
    {
        // 'Coffee Ride', 'Training', 'Climbing', 'Scenic Ride', 'Endurance', 'Bikepacking'
        // Climbing, Gravel, Coffee Ride, Social, Bikepacking, Endurance, XC / Trails, Adventure
        switch ($this->ride->rideType?->name) {
            case 'coffee':
                return 'vectors.stamps.ride-type-motives.coffee';
            case 'climbing':
                return 'vectors.stamps.ride-type-motives.climbing';
            case 'family':
                return 'vectors.stamps.ride-type-motives.family';
            case 'social':
                return 'vectors.stamps.ride-type-motives.social';
            case 'bikepacking':
                return 'vectors.stamps.ride-type-motives.bikepacking';
            case 'endurance':
                return 'vectors.stamps.ride-type-motives.endurance';
            case 'adventure':
                return 'vectors.stamps.ride-type-motives.adventure';
            case 'trails':
                return 'vectors.stamps.ride-type-motives.trails';
            case 'paceline':
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
            'adventure' => ['40', '100%', ['46%', '75%']],
            'bikepacking' => ['85', '100%', ['34%', '65%']],
            'climbing' => ['359', '100%', ['42%', '75%']],
            'endurance' => ['215', '100%', ['40%', '85%']],
            'coffee' => ['27', '100%', ['31%', '66%']],
            'family' => ['115', '100%', ['51%', '62%']],
            'paceline' => ['65', '100%', ['48%', '70%']],
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

<div class="relative">
    <x-vectors.filters.pergament-texture class="absolute size-full rounded-xl" />
    <x-ride.card.skeletton
        rootclass="place-content-center {{-- flacky-texture-bg-2 --}}  rounded-xl card-bg {{ $rideType }}"
        class="grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-start! text-start! text-neutral-300 uppercase">
        <div
            class="col-span-4 row-span-6 grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-between place-items-center items-stretch justify-items-stretch border-dashed border-gray-600">
            <div class="col-span-4 flex items-center divide-x text-sm">
                <div class="border-y border-l border-{{ $rideType }}-800 px-1 text-{{ $rideType }}-300">
                    {{ $index }}
                </div>
                <div class="border-y border-r border-{{ $rideType }}-800 bg-{{ $rideType }}-400/70 px-1 font-bold">
                    upcoming
                </div>
            </div>
            <div
                class="col-span-5 row-span-5 grid grid-cols-2 grid-rows-3 justify-stretch divide-x divide-y divide-dashed divide-gray-600 border-y border-l border-dashed border-gray-600">
                <x-ride.card.ride-property-stamp color="blue-300" :show="$ride->no_drop == '0'">
                    <x-vectors.nodrop x-bind="icon" class="aspect-1 origin-center scale-110" />
                </x-ride.card.ride-property-stamp>

                <x-ride.card.ride-property-stamp color="lime-300" :show="$ride->regroup_at_climbs == '1'">
                    <x-vectors.2persons x-bind="icon" class="aspect-1 origin-center scale-110" />
                </x-ride.card.ride-property-stamp>

                <x-ride.card.ride-property-stamp color="pink-200" :show="$ride->beginner_friendly == '1'">
                    <x-vectors.tricycle x-bind="icon" class="aspect-1 scale-95" />
                </x-ride.card.ride-property-stamp>

                <x-ride.card.ride-property-stamp color="yellow-300" :show="$ride->coffee_stop == '1'">
                    <x-vectors.coffeecup x-bind="icon" class="aspect-1 scale-95" />
                </x-ride.card.ride-property-stamp>

                @if ($ride->ebike_friendly === 1)
                    <x-ride.card.ride-property-stamp color="green-300" :show="true">
                        <x-vectors.ebikes-welcome x-bind="icon" class="aspect-1 scale-95" />
                    </x-ride.card.ride-property-stamp>
                @elseif ($ride->ebike_friendly === 0)
                    <x-ride.card.ride-property-stamp color="red-400" :show="$ride->no_drop == '0'">
                        <x-vectors.no-ebikes x-bind="icon" class="aspect-1 scale-95" />
                    </x-ride.card.ride-property-stamp>
                @else
                    <div class=""></div>
                @endif

                <div class="flex size-full origin-center items-center justify-start text-lime-300"></div>
            </div>
        </div>

        <div
            class="relative col-span-6 row-span-6 flex size-full items-center justify-center overflow-visible border border-dashed border-gray-600 text-xs">
            <x-vectors.stamps.stamp
                :color="$this->getRideTypeColorVar('400')"
                :ridetype="$rideType"
                class="absolute"
                x-data="stamp({
            opacity: 0.6,
            radius: 80,
            innerBorder: 1.5,
            outerBorder: 6,
            padding: 6,
            maxJitter: 1.2,
            topText: '{{ $this->rideStats['TYPE'] }}',
            centerText: '{{ $this->rideStats['DISC'] }}',
            bottomText: '* {{ $this->meetsAtPlace() }}, {{ $this->rideStats['DATE'] }} *',
            font: {top: {size: 'md', weight: 'bold'}, center: {size: 'lg', weight: 'normal'}, bottom:{size: 'sm', weight: 'thin'}},
            maxTransform: { tx: 15, ty: 20, rot: 30 },
            iconFilter: 'soft',
        })">
                <x-dynamic-component
                    uniqueid="{{ $ride->id }}"
                    :component="$this->rideTypeMotive"
                    x-bind:class="`w-[${iconRect.width}px] h-[${iconRect.height}px]`"
                    x-bind:x="iconRect.x"
                    x-bind:y="iconRect.y"
                    x-bind:width="iconRect.width"
                    x-bind:height="iconRect.height"
                    class="mt-4" />
            </x-vectors.stamps.stamp>
        </div>

        <div class="col-span-10 row-span-1"></div>
        <h3
            class="col-span-10 row-span-1 items-end truncate text-lg font-bold ride-title inline-flex relative {{ $rideType }}">
            <x-vectors.filters.rough-edges id="rough-edges-title" />
            <span
                style="filter: url(#rough-edges-title)"
                class="absolute size-full border-2 border-{{ $rideType }}-700/50"></span>
            <span class="size-full">{{ $ride->title }}</span>
        </h3>
        <div class="col-span-10 row-span-1"></div>

        <ul class="col-span-10 row-span-10 grid grid-cols-subgrid grid-rows-subgrid">
            @foreach ($this->rideStats as $key => $value)
                <li
                    x-data="{
                        id: 0,
                        seed: 0,
                        init() {
                            this.id = Math.random().toString(36).substring(2, 9);
                            this.seed = Math.floor(Math.random() * 1000);
                        }
                    }"
                    wire:key="ride-{{ $ride->id }}-{{ $key }}"
                    class="col-span-10 grid grid-cols-subgrid grid-rows-subgrid">
                    <span class="col-span-4 flex items-end">{{ $key }}</span>
                    <span
                        class="relative col-span-6 flex items-end justify-stretch truncate capitalize ride-stats-value {{ $rideType }} ">
                        <x-vectors.filters.rough-edges x-bind:id="`rough-edges-${id}`" />
                        <span
                            x-bind:style="`filter: url(#rough-edges-${id})`"
                            class="absolute size-full border-2 border-{{ $rideType }}-700/50"></span>
                        <span class="z-10 size-full">{{ $value }}</span>
                    </span>
                </li>
            @endforeach
        </ul>

        <div class="col-span-10"></div>

        <x-ride.card.tw-utils-dummy />
    </x-ride.card.skeletton>
</div>
