<?php

namespace Database\Factories;

use App\Enums\IsAgreeing;
use App\Models\Ride;
use App\Models\RideFeedback;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<RideFeedback>
 */
class RideFeedbackFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'ride_id' => Ride::whereDate('meets_at', '<', now())->pluck('id')->random(),
            'user_id' => User::all()->pluck('id')->random(),
            'matched_description' => collect(IsAgreeing::cases())->random()
        ];
    }
}
