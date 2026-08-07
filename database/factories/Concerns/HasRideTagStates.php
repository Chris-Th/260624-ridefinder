<?php

namespace Database\Factories\Concerns;

use App\Enums\EbikePreference;
use App\Enums\ExperiencePreference;
use App\Models\Ride;
use App\Models\RideTag;

trait HasRideTagStates
{
    public function ebikesOnly(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName(EbikePreference::Only)
            );
        });
    }

    public function noEbikes(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName(EbikePreference::None)
            );
        });
    }

    public function beginnersOnly(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName(ExperiencePreference::BeginnerOnly)
            );
        });
    }

    public function experiencedOnly(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName(ExperiencePreference::ExperiencedOnly)
            );
        });
    }

    public function noDrop(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName('no_drop')
            );
        });
    }

    public function regroupAtClimbs(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName('regroup_at_climbs')
            );
        });
    }

    public function coffeeStop(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName('coffee_stop')
            );
        });
    }

    public function beginnerFriendly(): static
    {
        return $this->afterCreating(function (Ride $ride) {
            $ride->tags()->attach(
                RideTag::findByName('beginner_friendly')
            );
        });
    }
}
