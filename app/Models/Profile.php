<?php

namespace App\Models;

use Database\Factories\ProfileFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Profile extends Model
{
    /** @use HasFactory<ProfileFactory> */
    use HasFactory;

    public function disciplines(): BelongsToMany
    {
        return $this->belongsToMany(Discipline::class);
    }

    public function typicalDiscipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function paces(): BelongsToMany
    {
        return $this->belongsToMany(Pace::class);
    }

    public function rideTypes(): BelongsToMany
    {
        return $this->belongsToMany(RideType::class);
    }

    public function typicalRides(): HasMany
    {
        return $this->hasMany(TypicalRide::class);
    }
}
