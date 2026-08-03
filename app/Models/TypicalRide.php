<?php

namespace App\Models;

use App\Enums\RideDistance;
use Database\Factories\TypicalRideFactory;
use Illuminate\Database\Eloquent\Attributes\Unguarded;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

#[Unguarded]
class TypicalRide extends Model
{
    /** @use HasFactory<TypicalRideFactory> */
    use HasFactory;

    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }

    public function user(): HasOneThrough
    {
        return $this->hasOneThrough(User::class, Profile::class);
    }

    public function rideType(): BelongsTo
    {
        return $this->belongsTo(RideType::class);
    }

    public function discipline(): BelongsTo
    {
        return $this->belongsTo(Discipline::class);
    }

    public function pace(): BelongsTo
    {
        return $this->belongsTo(Pace::class);
    }

    protected function casts(): array
    {
        return [
            'min_distance' => RideDistance::class,
            'max_distance' => RideDistance::class,
        ];
    }
}
