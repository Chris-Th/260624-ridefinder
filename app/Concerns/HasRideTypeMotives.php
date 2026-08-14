<?php

namespace App\Concerns;

use Illuminate\Support\Str;
use Livewire\Attributes\Computed;

trait HasRideTypeMotives
{
    #[Computed]
    public function getRideTypeMotivePath($case)
    {
        // 'Coffee Ride', 'Training', 'Climbing', 'Scenic Ride', 'Endurance', 'Bikepacking'
        // Climbing, Gravel, Coffee Ride, Social, Bikepacking, Endurance, XC / Trails, Adventure
        switch ($case) {
            case 'coffee':
                return 'vectors.stamps.ride-type-motives.coffee';
            case 'climbing':
                return 'vectors.stamps.ride-type-motives.climbing';
            case 'family':
                return 'vectors.stamps.ride-type-motives.family';
            case 'social':
                return 'vectors.stamps.ride-type-motives.social';
            case 'bikepacking':
                return 'vectors.stamps.ride-type-motives.bikepacking';
            case 'endurance':
                return 'vectors.stamps.ride-type-motives.endurance';
            case 'adventure':
                return 'vectors.stamps.ride-type-motives.adventure';
            case 'trails':
                return 'vectors.stamps.ride-type-motives.trails';
            case 'paceline':
                return 'vectors.stamps.ride-type-motives.paceline';
            default:
                return 'vectors.stamps.ride-type-motives.default';
        }
    }

    public function getRideTypeColorVar($lightness = '500', $rideType = null): string
    {
        $rideType = Str::before(Str::lcfirst($rideType ?? ''), ' ');

        /* return $rideType
            ? "var(--color-{$rideType}-{$lightness})"
            : "var(--color-neutral-500)"; */

        /* return match ($rideType) {
            'adventure' => '--color-adventure-' . $lightness,
            'bikepacking' => '--color-bikepacking-' . $lightness,
            'climbing' => '--color-climbing-' . $lightness,
            'endurance' => '--color-endurance-' . $lightness,
            'coffee' => '--color-coffee-' . $lightness,
            'family' => '--color-family-' . $lightness,
            'paceline' => '--color-paceline-' . $lightness,
            'social' => '--color-social-' . $lightness,
            'trails' => '--color-trails-' . $lightness,
            default => '--color-neutral-' . $lightness,
        }; */

        return match ($rideType) {
            'adventure' => "var(--color-adventure-$lightness)",
            'bikepacking' => "var(--color-bikepacking-$lightness)",
            'climbing' => "var(--color-climbing-$lightness)",
            'endurance' => "var(--color-endurance-$lightness)",
            'coffee' => "var(--color-coffee-$lightness)",
            'family' => "var(--color-family-$lightness)",
            'paceline' => "var(--color-paceline-$lightness)",
            'social' => "var(--color-social-$lightness)",
            'trails' => "var(--color-trails-$lightness)",
            default => "var(--color-neutral-$lightness)",
        };

    }
}
