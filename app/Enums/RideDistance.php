<?php

namespace App\Enums;

enum RideDistance: int
{
    case Km0 = 0;
    case Km10 = 10;
    case Km25 = 25;
    case Km50 = 50;
    case Km75 = 75;
    case Km100 = 100;
    case Km125 = 125;
    case Km150 = 150;

    /**
     * @return array<RideDistance>
     */
    public static function distances(): array
    {
        return self::cases();
    }

    public static function random(): self
    {
        return fake()->randomElement(self::distances());
    }

    public function greaterOrEqual(): array
    {
        return array_filter(
            self::distances(),
            fn (self $case) => $case->value >= $this->value || $case->value === null,
        );
    }

    public function randomGreaterOrEqual(bool $allowAny = true): ?self
    {
        $choices = $this->greaterOrEqual();

        return fake()->randomElement($choices);
    }

    public function lesserOrEqual(): array
    {
        return array_filter(
            self::distances(),
            fn (self $case) => $case->value <= $this->value || $case->value === null,
        );
    }

    public function randomLesserOrEqual(bool $allowAny = true): ?self
    {
        $choices = $this->lesserOrEqual();

        return fake()->randomElement($choices);
    }

    public static function randomRange(): array
    {
        $min = self::random();
        $max = $min->randomGreaterOrEqual();

        return [$min, $max];
    }

    public static function getDistanceRangeString(
        ?self $minDistance = null,
        ?self $maxDistance = null,
    ): ?string {
        if ($minDistance === null && $maxDistance === null) {
            return null;
        }

        if ($minDistance === $maxDistance) {
            return "{$maxDistance->value} Km";
        }

        if ($minDistance !== null && $maxDistance !== null) {
            return "{$minDistance->value} - {$maxDistance->value} Km";
        }

        if ($minDistance !== null) {
            return "{$minDistance->value} Km or more";
        }

        return "Up to {$maxDistance->value} Km";
    }
}
