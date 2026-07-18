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
            'adventure' => 'var(--color-adventure-300)',
            'bikepacking' => 'var(--color-bikepacking-300)',
            'climbing' => 'var(--color-climbing-300)',
            'endurance' => 'var(--color-endurance-300)',
            'coffee' => 'var(--color-coffee-300)',
            'family' => 'var(--color-family-300)',
            'paceline' => 'var(--color-paceline-300)',
            'social' => 'var(--color-social-300)',
            'trails' => 'var(--color-trails-300)',
            default => 'var(--color-neutral-300)',
        };

    }

    public function getBGColor($rideType, $opacity = '30')
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

<x-ride.card.skeletton
    rootclass="place-content-center"
    class="grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-start! text-start! uppercase">
    <div
        class="col-span-4 row-span-6 grid grid-flow-row grid-cols-subgrid grid-rows-subgrid place-content-between place-items-center justify-items-start">
        {{-- <div
            class=&quot;col-span-4 row-span-2 grid h-full grid-flow-col grid-cols-subgrid grid-rows-subgrid items-start justify-between bg-white/10&quot;>
            <div
                class=&quot;shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center border border-dotted bg-white/5 shadow-white/20&quot;>
                <x-vectors.nodrop
                    @class([
                'rounded-full size-6  fill-blue-300 aspect-1',
                'opacity-0' => $ride->no_drop == '0',
            ])
                    class=&quot;&quot;></x-vectors.nodrop>
            </div>
            <div
                class=&quot;shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-fit items-center rounded-full border border-dotted bg-white/5 shadow-white/20&quot;>
                <x-vectors.2persons
                    @class([
                'rounded-full size-6  fill-green-300 aspect-1',
                'opacity-0' => $ride->regroup_at_climbs == '0',
            ])
                    class=&quot;&quot;></x-vectors.2persons>
            </div>
            <div
                class=&quot;shadow-firm-sm-inner border-2-white/80 aspect-1 flex size-6 items-center rounded-full border border-dotted bg-white/5 shadow-white/20&quot;>
                <x-vectors.tricycle
                    @class([
                'rounded-full size-5  fill-pink-200 border-2-pink-200 aspect-1',
                'opacity-0' => $ride->beginner_friendly == '0',
            ])
                    class=&quot;&quot;></x-vectors.tricycle>
            </div>
            <div
                class=&quot;shadow-firm-sm-inner border-2-white/80 aspect-1 flex h-6 w-7 items-center rounded-full border border-dotted bg-white/5 shadow-white/20&quot;>
                <x-vectors.coffeecup
                    @class([
                'rounded-full w-8 h-6  fill-yellow-400 border-2-yellow-400 scale-x-150',
                'opacity-0' => $ride->coffee_stop == '0',
            ])
                    class=&quot;&quot;></x-vectors.coffeecup>
            </div>
        </div>
        <div class=&quot;col-span-1 row-span-2 bg-white/5&quot;></div> --}}

        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start text-blue-300">
            @if ($ride->no_drop == '1')
                <x-vectors.stamps.stamp
                    @class([
                'absolute text-blue-300 fill-blue-300 aspect-1 ',
                'opacity-0' => $ride->no_drop == '0',
            ])
                    x-data="
                        stamp({
                            opacity: 1,
                            radius: 20,
                            outerBorder: 2,
                            padding: 0,
                            maxJitter: 0.2,
                            maxTransform: { tx: 2, ty: 3, rot: 30 },
                            iconFilter: 'softer'
                        })
                    ">
                    <x-vectors.nodrop x-bind="icon" class="aspect-1 origin-center scale-110" />
                </x-vectors.stamps.stamp>
            @endif
        </div>

        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start text-lime-300">
            @if ($ride->regroup_at_climbs == '1')
                <x-vectors.stamps.stamp
                    @class([
                'absolute text-lime-300 fill-lime-300 aspect-1',
                'opacity-0' => $ride->regroup_at_climbs == '0',
            ])
                    x-data="
                        stamp({
                            // opacity: 0.8,
                            radius: 20,
                            outerBorder: 2,
                            padding: 0,
                            maxJitter: 0.2,
                            maxTransform: { tx: 2, ty: 3, rot: 30 },
                            iconFilter: 'softer'
                        })
                    ">
                    <x-vectors.2persons x-bind="icon" class="aspect-1 origin-center scale-110" />
                </x-vectors.stamps.stamp>
            @endif
        </div>

        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start text-pink-200">
            @if ($ride->beginner_friendly == '1')
                <x-vectors.stamps.stamp
                    @class([
                'absolute text-pink-200 fill-pink-200 aspect-1 opacity-80',
                'opacity-0' => $ride->beginner_friendly == '0',
            ])
                    x-data="
                        stamp({
                            // opacity: 0.8,
                            radius: 20,
                            outerBorder: 2,
                            padding: 2,
                            maxJitter: 0.6,
                            maxTransform: { tx: 5, ty: 5, rot: 30 },
                            iconFilter: 'softer'
                        })
                    ">
                    <x-vectors.tricycle x-bind="icon" class="aspect-1 scale-95" />
                </x-vectors.stamps.stamp>
            @endif
        </div>

        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start text-yellow-300">
            @if ($ride->coffee_stop == '1')
                <x-vectors.stamps.stamp
                    @class([
                'absolute text-yellow-300 fill-yellow-300 aspect-1 opacity-80',
                'opacity-0' => $ride->coffee_stop == '0',
            ])
                    x-data="
                        stamp({
                            // opacity: 0.8,
                            radius: 20,
                            outerBorder: 2,
                            padding: 2,
                            maxJitter: 0.6,
                            maxTransform: { tx: 5, ty: 5, rot: 30 },
                            iconFilter: 'softer'
                        })
                    ">
                    <x-vectors.coffeecup x-bind="icon" class="aspect-1 scale-95" />
                </x-vectors.stamps.stamp>
            @endif
        </div>
        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start">
            @if ($ride->ebike_friendly === 1)
                <div class="text-green-300">
                    <x-vectors.stamps.stamp
                        class="aspect-1 size-9 scale-95 fill-green-300 text-green-300 opacity-80"
                        x-data="
                            stamp({
                                // opacity: 0.8,
                                radius: 20,
                                outerBorder: 2,
                                padding: 2,
                                maxJitter: 0.6,
                                maxTransform: { tx: 5, ty: 5, rot: 30 },
                                iconFilter: 'softer'
                            })
                        ">
                        <x-vectors.ebikes-welcome x-bind="icon" class="aspect-1 scale-95" />
                    </x-vectors.stamps.stamp>
                </div>

            @elseif ($ride->ebike_friendly === 0)
                <div class="text-red-400">
                    <x-vectors.stamps.stamp
                        class="aspect-1 size-9 scale-95 fill-red-400 text-red-400 opacity-80"
                        x-data="
                            stamp({
                                // opacity: 0.8,
                                radius: 20,
                                outerBorder: 2,
                                padding: 2,
                                maxJitter: 0.6,
                                maxTransform: { tx: 2, ty: 3, rot: 30 },
                                iconFilter: 'softer'
                            })
                        ">
                        <x-vectors.no-ebikes x-bind="icon" class="aspect-1 scale-95" />
                    </x-vectors.stamps.stamp>
                </div>

            @else
                <div></div>
            @endif
        </div>
        <div class="col-span-2 row-span-2 flex size-full origin-center items-center justify-start text-lime-300"></div>

        <div
            class="col-span-2 row-span-2 flex origin-center scale-95 items-center justify-center rounded-full bg-white/5"></div>
    </div>

    <div
        class="bg-base-100/80 relative col-span-6 row-span-6 flex size-full items-center justify-center overflow-visible border border-dashed border-gray-600 text-xs">
        {{-- <img class="object-fill object-left h-26 align-middle flex items-center justify-center size-full" src="{{ $this->rideImgSrc }}"  alt="Illustration of {{ $ride->rideType?->name }}">  --}}

        <x-vectors.stamps.stamp
            :color="$this->getRideTypeColorVar('400')"
            :ridetype="$rideType"
            class="absolute"
            {{-- style="color: var({{ $this->getRideTypeColorVar('300') }})" --}}
            x-data="stamp({
            opacity: 0.8,
            radius: 80,
            innerBorder: 1.5,
            outerBorder: 6,
            padding: 6,
            maxJitter: 1.2,
            topText: '{{ $this->listItems['TYPE'] }}',
            centerText: '{{ $this->listItems['DISC'] }}',
            bottomText: '* {{ $this->meetsAtPlace() }}, {{ $this->listItems['DATE'] }} *',
            font: {top: {size: 'md', weight: 'normal'}, center: {size: 'lg', weight: 'normal'}, bottom:{size: 'sm', weight: 'normal'}},
            maxTransform: { tx: 20, ty: 30, rot: 30 },
            iconFilter: 'softer'
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

    {{-- <div class="row-span-1 col-span-4"></div> --}}
    {{-- src="{{ Storage::url('public/ridetypeimages/paceline-drawn-white-transparent.png') }}" --}}

    <div class="col-span-10 row-span-1"></div>
    @php

    @endphp
    <h3
        @class ([
            'col-span-10 row-span-1 flex items-end truncate text-lg font-bold ' . $this->getBGColor($rideType),

        ])>
        {{ $ride->title }}
    </h3>
    <div class="col-span-10 row-span-1"></div>

    @foreach ($this->listItems as $key => $value)
        <span class="col-span-4 flex items-end">{{ $key }}</span>
        <span
            @class ([ "col-span-6 flex items-end truncate capitalize " . $this->getBGColor($rideType, '10')])
            >{{ $value }}</span
        >
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
