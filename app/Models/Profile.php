<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Profile extends Model
{
    /** @use HasFactory<\Database\Factories\ProfileFactory> */
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
}
