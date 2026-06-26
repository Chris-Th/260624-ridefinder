<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pace extends Model
{
    /** @use HasFactory<\Database\Factories\PaceFactory> */
    use HasFactory;

    public function profiles(): HasMany
    {
        return $this->hasMany(Profile::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }
}
