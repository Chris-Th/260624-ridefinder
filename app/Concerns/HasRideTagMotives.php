<?php

namespace App\Concerns;

use Illuminate\Support\Str;

trait HasRideTagMotives
{
    public function getRideTagColor($rideTag = null): string
    {
        $rideTag = Str::before(Str::lcfirst($rideTag ?? ''), ' ');

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

        return match ($rideTag) {
            'no-drop' => 'blue-300',
            'regroup-at-climbs' => 'lime-300',
            'experienced-only' => 'amber-400',
            'beginner-only' => 'pink-300',
            'coffee-stop' => 'yellow-300',
            'ebikes-only' => 'green-300',
            'no-ebikes' => 'red-400',
            'beginner-friendly' => 'purple-300',
            default => 'neutral-300',
        };

    }
}
