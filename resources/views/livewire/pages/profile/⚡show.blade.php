<?php

use App\Concerns\HasRideTagMotives;
use App\Concerns\HasRideTypeMotives;
use App\Enums\RideDistance;
use App\Models\Discipline;
use App\Models\Pace;
use App\Models\Profile;
use App\Models\RideType;
use App\Models\TypicalRide;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Json;
use Livewire\Component;

new class extends Component
{
    use HasRideTagMotives, HasRideTypeMotives;

    public Profile $profile;

    public $typicalRides = [];

    // public $selectedRideType = []; // ['typical_ride_id' => 1, 'ride_type_id' => 1]
    // public $profilePhoto;

    public array $draftTypicalRides = [];

    public function mount($id)
    {
        $this->profile = Profile::findOrFail($id);

        $this->init();

        /* $this->draftTypicalRides = $this->typicalRides
        ->mapWithKeys(fn (TypicalRide $ride): array => [
            $ride->id => [
                'ride_type_id' => $ride->ride_type_id,
            ],
        ])
        ->all(); */

        // $this->rideTags = collect($this->profile->typicalRides()->rideTags()->pluck('name')->all());
        // $this->profilePhoto = $this->profile->getMedia('profile-photo');
    }

    protected function init()
    {
        $this->typicalRides = $this->profile->typicalRides()->with(['rideType', 'rideTags', 'pace', 'discipline'])->withCount('rideTags')->get();
        $this->draftTypicalRides = $this->typicalRides
            ->mapWithKeys(fn (TypicalRide $ride): array => [
                $ride->id => [
                    'name' => $ride->name,
                    'distance_range' => [
                        'min' => $ride->min_distance,
                        'max' => $ride->max_distance,
                    ],
                    'ride_type' => [
                        'id' => $ride->ride_type_id,
                        'name' => $ride->rideType->name,
                        'icon_view_component' => $ride->rideType->icon_view_component,
                    ],
                    'pace' => [
                        'id' => $ride->pace_id,
                        'name' => $ride->pace->name,
                    ],
                    'discipline' => [
                        'id' => $ride->discipline_id,
                        'name' => $ride->discipline->name,
                    ],
                ],
            ])
            ->all();
    }

    public function save(): void
    {
        $this->validate([
            'draftTypicalRides.*.ride_type.id' => ['required', 'integer', 'exists:ride_types,id'],
            'draftTypicalRides.*.pace.id' => ['integer', 'exists:paces,id'],
            'draftTypicalRides.*.discipline.id' => ['integer', 'exists:disciplines,id'],
            'draftTypicalRides.*.distance_range.min' => ['integer', Rule::enum(RideDistance::class)],
            'draftTypicalRides.*.distance_range.max' => ['integer', Rule::enum(RideDistance::class)],
        ]);

        foreach ($this->draftTypicalRides as $typicalRideId => $draft) {
            $this->profile->typicalRides()
                ->whereKey($typicalRideId)
                ->update([
                    'ride_type_id' => $draft['ride_type']['id'],
                    'pace_id' => $draft['pace']['id'],
                    'discipline_id' => $draft['discipline']['id'],
                    'min_distance' => $draft['distance_range']['min'],
                    'max_distance' => $draft['distance_range']['max'],
                ]);
        }

        $this->init();
    }

    #[Computed]
    public function profilePhoto()
    {
        return $this->profile->getFirstMedia('profile-photo');
    }

    // #[Computed]
    // public function getTypicalRides()
    // {
    //     return $this->profile->typicalRides;
    // }

    public function getRandomAngle()
    {
        return rand(0, 359);
    }

    public function getRandomTurbulenceSeed()
    {
        return rand(1, 1000);
    }

    // public function updateTypicalRideRelation(string $relation, $typicalRideId, $relationId)
    // {
    //     // in blade: updateTypicalRideRelation('{{ \App\Models\RideType::class }}', $typicalRideId, $relationId)
    //     // if (!is_subclass_of($modelClass, \Illuminate\Database\Eloquent\Model::class)) {
    //     //     throw new \InvalidArgumentException('Invalid model class');
    //     // }
    //     $typicalRide = TypicalRide::find($typicalRideId);

    //     $column = $relation.'_id';

    //     $typicalRide->update([$column => $relationId]);
    // }

    #[Json]
    public function rideTypesJson()
    {
        return RideType::all(['id', 'name', 'icon_view_component']);
    }

    // #[Computed]
    // public function rideTypes()
    // {
    //     return RideType::all(['id', 'name', 'icon_view_component']);
    // }

    // #[Computed]
    // public function rideTypeCount()
    // {
    //     return $this->rideTypes->count();
    // }

    public function getStampPath($rideTag)
    {
        return match ($rideTag) {
            'beginner-only' => '',
        };
    }

    // public function addRowsForTags($typicalRide)
    // {
    //     $count = $typicalRide->ride_tags_count;
    //     // dump($count);
    //     $additionalRowsNumber = function ($count) {
    //         if ($count > 0 && $count <= 2) {
    //             return 2;
    //         }
    //         if ($count > 2 && $count <= 4) {
    //             return 4;
    //         }
    //         if ($count > 4 && $count <= 6) {
    //             return 6;
    //         }
    //         if ($count > 6) {
    //             return 8;
    //         }

    //         return 0;
    //     };

    //     return $additionalRowsNumber($count);

    // }

    #[Computed]
    public function rideTypeOptions()
    {
        $types = RideType::all(['id', 'name', 'icon_view_component']);

        return $types->mapWithKeys(fn (RideType $type): array => [
            $type->id => [
                'id' => $type->id,
                'name' => $type->name,
                'icon_view_component' => $type->icon_view_component,
                'color' => $this->getRideTypeColorVar('400', $type->name),
                'bgcolor' => $this->getRideTypeColorVar('900', $type->name),
            ],
        ]);
    }

    #[Computed]
    public function paceOptions()
    {
        $paces = Pace::all(['id', 'name']);

        return $paces->mapWithKeys(fn (Pace $pace): array => [
            $pace->id => [
                'id' => $pace->id,
                'name' => $pace->name,
            ],
        ]);
    }

    #[Computed]
    public function disciplineOptions()
    {
        $disciplines = Discipline::all(['id', 'name']);

        return $disciplines->mapWithKeys(fn (Discipline $discipline): array => [
            $discipline->id => [
                'id' => $discipline->id,
                'name' => $discipline->name,
            ],
        ]);
    }
};
?>

<div class="text-base-content mx-auto h-dvh max-w-4xl text-sm">
    <x-vectors.filters.textures.factory>
        {{-- freq 0.0008: 229, 531, 106 freq 0.0004: 434, 305, 750 (vertical), 298 (horizontal) --}}
        @for ($i = 0; $i < 3; $i++)
            <x-vectors.filters.textures.primitives.metal-plate-3
                :seed="$i === 0 ? '1' : ($i === 1 ? '237' : '655')"
                :id="'texture-1-'.$i" />
        @endfor
    </x-vectors.filters.textures.factory>
    <x-vectors.filters.ink-grit-filter />

    <div class="mx-auto flex h-full w-full flex-col justify-start gap-8">
        {{ $this->profilePhoto()->img()->attributes([ 'class' => 'max-w-64 rounded-full border border-mist-800 mx-auto' ]) }}
        <div class="flex h-fit w-full justify-end">
            <button
                wire:click="save"
                wire:dirty
                class="btn btn-secondary">
                Save
            </button>
        </div>
        <div class="flex h-full flex-col gap-6">
            <div class="mx-4">
                <h4 class="mb-4 text-lg font-bold italic">Name:</h4>
                <p>{{ $profile->user->name }}</p>
            </div>
            <div class="mx-4">
                <h4 class="mb-4 text-lg font-bold italic">Bio:</h4>
                <p>{{ $profile->bio }}</p>
            </div>

            <h4 class="victor-mono-italic ms-4 mb-4 text-lg font-bold">Typical Rides:</h4>
            <div class="mx-auto h-full! w-full columns-[12rem] items-center gap-8">
                @foreach ($typicalRides as $typicalRide)
                    <x-typical-ride.card.index
                        :typical-ride="$typicalRide"
                        :iteration="$loop->iteration"
                        :draft="$draftTypicalRides[$typicalRide->id]"
                        :ride-types="$this->rideTypeOptions"
                        :paces="$this->paceOptions"
                        :disciplines="$this->disciplineOptions"
                        :ride-type-count="$this->rideTypeOptions->count()"
                        :pace-count="$this->paceOptions->count()"
                        :discipline-count="$this->disciplineOptions->count()"
                        :distance-count="collect(Arr::from(RideDistance::cases()))->count()"
                        :ride-type-wire-model="'draftTypicalRides.'.$typicalRide->id.'.ride_type.id'"
                        :pace-wire-model="'draftTypicalRides.'.$typicalRide->id.'.pace.id'"
                        :discipline-wire-model="'draftTypicalRides.'.$typicalRide->id.'.discipline.id'"
                        :distance-range-wire-model="'draftTypicalRides.'.$typicalRide->id.'.distance_range'"
                        :saved-pace="$typicalRide->pace->name"
                        :saved-discipline="$typicalRide->discipline->name"
                        :saved-min-distance="$typicalRide->min_distance"
                        :saved-max-distance="$typicalRide->max_distance"
                        :saved-ride-type-color="$this->getRideTypeColorVar(400, $typicalRide->rideType->name)"
                        wire:key="typical-ride-{{ $typicalRide->id }}" />

                @endforeach
            </div>
        </div>
    </div>

    {{-- <div class="grid h-full items-center gap-x-5 gap-y-3 md:grid-cols-2 xl:grid-cols-3"> --}}
</div>
