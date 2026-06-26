<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RideType extends Model
{
    /** @use HasFactory<\Database\Factories\RideTypeFactory> */
    use HasFactory;

    public function profiles():BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }

    public function rides():HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
