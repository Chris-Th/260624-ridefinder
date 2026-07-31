<?php

namespace App\Enums;

enum DistanceRange: int
{
    case Km10 = 10;
    case Km25 = 25;
    case Km50 = 50;
    case Km75 = 75;
    case Km100 = 100;
    case Km125 = 125;
    case Km150 = 150;
    case Any = null;

    public function minKm(): ?int
    {
        return match ($this) {
            self::Any => null,
            self::Km10 => 10,
            self::Km25 => 25,
            self::Km50 => 50,
            self::Km75 => 75,
            self::Km100 => 100,
            self::Km125 => 125,
            self::Km150 => 150,
        };
    }

    public function maxKm(): ?int
    {
        return match ($this) {
            self::Km10 => 10,
            self::Km25 => 25,
            self::Km50 => 50,
            self::Km75 => 75,
            self::Km100 => 100,
            self::Km125 => 125,
            self::Km150 => 150,
            self::Any => null,
        };
    }
}
