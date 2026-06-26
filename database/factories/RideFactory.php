<?php

namespace Database\Factories;

use App\Enums\ZurichCantonCity;
use App\Models\Discipline;
use App\Models\Pace;
use App\Models\Ride;
use App\Models\RideType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Carbon\Carbon;

/**
 * @extends Factory<Ride>
 */
class RideFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $meetsAt = fake()->dateTimeThisYear('+4 months');
        $meetsAt = Carbon::parse($meetsAt)->roundUnit('minute', 5);
        $leavesAt = $meetsAt->addMinutes(rand(1, 6) * 5);
        $leavesAt = rand(1, 10) < 7 ? $leavesAt : null;

        return [
            'user_id' => User::all()->pluck('id')->random(),
            'title' => fake()->sentence(3),
            'description' => fake()->sentences(3, true),
            'discipline_id' => Discipline::all()->pluck('id')->random(),
            'pace_id' => Pace::all()->pluck('id')->random(),
            'ride_type_id' => RideType::all()->pluck('id')->random(),
            'distance_km' => rand(200, 2000) / 10,
            'elevation_m' => rand(20, 3000),
            'meeting_point_name' => fake()->word(),
            'meeting_point_address' => fake()->word() . 'strasse ' . rand(1, 300) . ', ' . rand(8000, 8999) . ' ' . collect(ZurichCantonCity::cases())->pluck('value')->random(),
            'meets_at' => $meetsAt,
            'leaves_at' => $leavesAt,
            'max_riders' => rand(2, 15),
            'no_drop' => rand(1, 10) > 3 ? true : false,
            'regroup_at_climbs' => rand(1, 10) > 3 ? true : false,
            'coffee_stop' => rand(1, 10) > 3 ? true : false,
            'beginner_friendly' => rand(1, 10) > 3 ? true : false,
        ];
    }
}
