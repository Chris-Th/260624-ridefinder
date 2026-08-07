<?php

namespace Database\Factories\Concerns;

use App\Models\RideType;

trait HasRideTypeState
{
    public function coffee(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('coffee')
            );
        });
    }

    public function trails(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('trails')
            );
        });
    }

    public function climbing(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('climbing')
            );
        });
    }

    public function social(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('social')
            );
        });
    }

    public function endurance(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('endurance')
            );
        });
    }

    public function bikepacking(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('bikepacking')
            );
        });
    }

    public function adventure(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('adventure')
            );
        });
    }

    public function family(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('family')
            );
        });
    }

    public function paceline(): static
    {
        return $this->afterCreating(function ($model) {
            $model->rideType()->attach(
                RideType::findByName('paceline')
            );
        });
    }
}
