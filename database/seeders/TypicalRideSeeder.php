<?php

namespace Database\Seeders;

use App\Models\TypicalRide;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Seeder;

class TypicalRideSeeder extends Seeder
{
    public Collection $profiles;

    public function __construct(Collection $profiles)
    {
        $this->profiles = $profiles;
    }

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        /* $this->profiles->each(fn ($profile) => TypicalRide::factory()
           ->count(rand(1, 5))
           ->create([
               'profile_id' => $profile->id
           ])); */
        $this->profiles->each(fn ($profile) => TypicalRide::factory()
            ->count(rand(1, 5))
            ->for($profile, 'profile')
            ->create());
    }
}
