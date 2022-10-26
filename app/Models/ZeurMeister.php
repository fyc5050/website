<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ZeurMeister extends Model
{
    use HasFactory, HasUuidColumn;

    // Filament require user_id to be fillable, we might be able to change this by saving the relation manually.
    // TODO: look into this.
    protected $fillable = [
        'week_number', 'year_number', 'user_id',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeCurrent(Builder $query)
    {
        $date = now();

        $query->where([
            ['week_number', $date->week],
            ['year_number', $date->year],
        ]);
    }
}
