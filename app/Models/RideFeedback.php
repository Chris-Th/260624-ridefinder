<?php

namespace App\Models;

use App\Enums\IsAgreeing;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RideFeedback extends Model
{
    /** @use HasFactory<\Database\Factories\RideFeedbackFactory> */
    use HasFactory;

    public function ride():BelongsTo
    {
        return $this->belongsTo(Ride::class);
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected function casts():array
    {
        return [
            'matched_description' => IsAgreeing::class
        ];
    }
}
