<?php

namespace Database\Factories\Concerns;

use App\Enums\EbikePreference;
use App\Enums\ExperiencePreference;
use App\Models\RideTag;

trait HasRideTagStates
{
    public function ebikesOnly(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName(EbikePreference::Only)
            );
        });
    }

    public function noEbikes(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName(EbikePreference::None)
            );
        });
    }

    public function beginnersOnly(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName(ExperiencePreference::BeginnerOnly)
            );
        });
    }

    public function experiencedOnly(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName(ExperiencePreference::ExperiencedOnly)
            );
        });
    }

    public function noDrop(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName('no-drop')
            );
        });
    }

    public function regroupAtClimbs(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName('regroup-at-climbs')
            );
        });
    }

    public function coffeeStop(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName('coffee-stop')
            );
        });
    }

    public function beginnerFriendly(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideTags()->attach(
                RideTag::findByName('beginner-friendly')
            );
        });
    }
}
