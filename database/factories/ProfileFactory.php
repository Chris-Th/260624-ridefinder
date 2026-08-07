<?php

namespace Database\Factories;

use App\Enums\ZurichCantonCity;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Profile>
 */
class ProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $locations = collect(ZurichCantonCity::cases());

        return [
            'user_id' => User::all()->pluck('id')->random(),
            'location' => $locations->random(),
            'bio' => fake()->paragraph(2),
        ];
    }
}
