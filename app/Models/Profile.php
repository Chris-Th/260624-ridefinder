<?php

namespace App\Models;

use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Profile extends Model implements HasMedia
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;

    use InteractsWithMedia;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function hostedRides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }

    public function joinedRides(): BelongsToMany
    {
        return $this->belongsToMany(Ride::class);
    }

    public function disciplines(): HasManyThrough
    {
        return $this->hasManyThrough(Discipline::class, TypicalRide::class);
    }

    public function paces(): HasManyThrough
    {
        return $this->hasManyThrough(Pace::class, TypicalRide::class);
    }

    public function rideTypes(): HasManyThrough
    {
        return $this->hasManyThrough(RideType::class, TypicalRide::class);
    }

    public function typicalRides(): HasMany
    {
        return $this->hasMany(TypicalRide::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('profile-photo')
            ->singleFile();
    }
}
