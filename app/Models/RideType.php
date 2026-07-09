<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;


#[Unguarded()]
class RideType extends Model implements HasMedia
{
    /** @use HasFactory<\Database\Factories\RideTypeFactory> */
    use HasFactory;
    use InteractsWithMedia;

    public function profiles():BelongsToMany
    {
        return $this->belongsToMany(Profile::class);
    }

    public function rides():HasMany
    {
        return $this->hasMany(Ride::class);
    }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('ride-types');
    }
}
