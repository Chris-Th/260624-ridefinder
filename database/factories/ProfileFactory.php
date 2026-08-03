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
        $range = $this->getRideDistance();

        return [
            'user_id' => User::all()->pluck('id')->random(),
            'location' => $locations->random(),
            'bio' => fake()->paragraph(2),
        ];
    }

    protected function getRideDistance()
    {
        $dists = collect([0, 25, 50, 75, 100]);
        $maxIndex = $dists->count() - 1;
        $maxDs = $dists->splice(rand(1, $maxIndex));

        $range = $maxIndex === 4 ? [100, null] : [$dists->random(), $maxDs->random()];

        return $range;
    }
}
