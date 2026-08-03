<?php

namespace App\Models;

use Database\Factories\PaceFactory;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Unguarded()]
class Pace extends Model
{
    /** @use HasFactory<PaceFactory> */
    use HasFactory;

    public function typicalRides(): HasMany
    {
        return $this->hasMany(TypicalRide::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
