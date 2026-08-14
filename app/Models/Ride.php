<?php

namespace App\Models;

use Database\Factories\RideFactory;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

#[Unguarded]
class Ride extends Model
{
    /** @use HasFactory<RideFactory> */
    use HasFactory;

    public function host(): BelongsTo
    {
        return $this->belongsTo(Profile::class, 'profile_id');
    }

    public function profile(): BelongsTo
    {
        return $this->host();
    }

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function pace(): BelongsTo
    {
        return $this->belongsTo(Pace::class);
    }

    public function rideType(): BelongsTo
    {
        return $this->belongsTo(RideType::class);
    }

    public function riders(): BelongsToMany
    {
        return $this->belongsToMany(Profile::class)->withTimestamps();
    }

    public function rideFeedbacks(): HasMany
    {
        return $this->hasMany(RideFeedback::class);
    }

    public function rideTags(): MorphToMany
    {
        return $this->morphToMany(RideTag::class, 'ride_taggable');
    }

    protected function distanceKm(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value.' km',
        );
    }

    protected function elevationM(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => $value.' m',
        );
    }

    protected function maxRiders(): Attribute
    {
        return Attribute::make(
            get: fn (string $value) => 'max '.$value.' Riders',
        );
    }

    protected function casts(): array
    {
        return [
            'meets_at' => 'datetime:D. d. m. Y H:i',
            'distance_km',
        ];
    }
}
