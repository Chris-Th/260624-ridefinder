<?php

namespace Database\Factories;

use App\Enums\RideDistance;
use App\Models\Discipline;
use App\Models\Pace;
use App\Models\Profile;
use App\Models\RideType;
use App\Models\TypicalRide;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<TypicalRide>
 */
class TypicalRideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $min = RideDistance::random();
        /* $max = fake()->boolean(0.2)
            ? null
            : $min->randomGreaterOrEqual(); */
        $max = rand(1, 10) < 8 ? $min->randomGreaterOrEqual() : null;
        $min = rand(1, 10) < 9 ? $min : null;

        return [
            'name' => fake()->words(2, true),
            'profile_id' => Profile::all()->pluck('id')->random(),
            'ride_type_id' => RideType::all()->pluck('id')->random(),
            'discipline_id' => Discipline::all()->pluck('id')->random(),
            'pace_id' => Pace::all()->pluck('id')->random(),
            'min_distance' => $min?->value,
            'max_distance' => $max?->value,
        ];
    }
}
