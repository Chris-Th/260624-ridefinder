<?php

namespace App\Models;

use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Profile extends Model
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
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
}
