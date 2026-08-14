<?php

namespace Tests;

use App\Models\Profile;
use App\Models\TypicalRide;
use App\Models\User;
use Database\Seeders\DisciplineSeeder;
use Database\Seeders\PaceSeeder;
use Database\Seeders\RideTagSeeder;
use Database\Seeders\RideTypeSeeder;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Fortify\Features;

abstract class TestCase extends BaseTestCase
{
    protected function skipUnlessFortifyHas(string $feature, ?string $message = null): void
    {
        if (!Features::enabled($feature)) {
            $this->markTestSkipped($message ?? "Fortify feature [{$feature}] is not enabled.");
        }
    }

    public function seedRideParents()
    {
        $this->seed([
            RideTypeSeeder::class,
            DisciplineSeeder::class,
            PaceSeeder::class,
            RideTagSeeder::class,
        ]);
    }

    public function createTypicalRide($user = null, $profile = null, array $userAttrs = [], array $profileAttrs = [], array $typicalRideAttrs = [])
    {
        $this->seedRideParents();
        $user ??= User::factory()->create($userAttrs);
        $profile ??= Profile::factory()->for($user)->create($profileAttrs);
        $typicalRide = TypicalRide::factory()->for($profile)->create($typicalRideAttrs);

        return [$user, $profile, $typicalRide];
    }
}
