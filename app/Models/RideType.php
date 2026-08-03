<?php

namespace App\Models;

use Database\Factories\RideTypeFactory;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

#[Unguarded()]
class RideType extends Model implements HasMedia
{
    /** @use HasFactory<RideTypeFactory> */
    use HasFactory;

    use InteractsWithMedia;

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }

    public function typicalRides(): HasMany
    {
        return $this->hasMany(TypicalRide::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('ride-types');
    }
}
