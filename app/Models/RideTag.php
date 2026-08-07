<?php

namespace App\Models;

use App\Enums\EbikePreference;
use App\Enums\ExperiencePreference;
use App\Enums\RideTagGroup;
use Database\Factories\RideTagFactory;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[Unguarded]
class RideTag extends Model
{
    /** @use HasFactory<RideTagFactory> */
    use HasFactory;

    public function rides(): MorphToMany
    {
        return $this->morphToMany(Ride::class, 'ride_taggable');
    }

    public function typicalRides(): MorphToMany
    {
        return $this->morphToMany(Ride::class, 'ride_taggable');
    }

    /**
     * Summary of findByName
     *
     * @return RideTag|\stdClass
     *
     * @example query RideTag::findByName(EbikePreference::Only);
     * @example query RideTag::findByName('coffee_stop');
     */
    public static function findByName(string|RideTagGroup|EbikePreference|ExperiencePreference $name): self
    {
        $name = $name instanceof RideTagGroup
            || $name instanceof EbikePreference
            || $name instanceof ExperiencePreference
            ? $name->value
            : $name;

        return static::where('name', $name)->firstOrFail();
    }
}
