<?php

namespace App\Enums;

enum RideType: string
{
    case Coffee = 'coffee';
    case Trails = 'trails';
    case Climbing = 'climbing';
    case Social = 'social';
    case Endurance = 'endurance';
    case Bikepacking = 'bikepacking';
    case Adventure = 'adventure';
    case Family = 'family';
    case Paceline = 'paceline';

    public static function values(): array
    {
        return array_map(fn ($case) => $case->value, self::cases());
    }
}
