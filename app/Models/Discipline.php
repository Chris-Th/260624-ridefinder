<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'slug'])]

class Discipline extends Model
{
    /** @use HasFactory<\Database\Factories\DisciplineFactory> */
    use HasFactory;

    public function typicalProfiles():HasMany // 'Profiles that selected this as their typical discipline'
    {
        return $this->hasMany(Profile::class);
    }

    public function rides(): HasMany
    {
        return $this->hasMany(Ride::class);
    }

    public function profiles(): BelongsToMany // profiles that participate in this discipline
    {
        return $this->belongsToMany(Profile::class);
    }

}
