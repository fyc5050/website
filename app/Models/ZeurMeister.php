<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZeurMeister extends Model
{
    use HasFactory, HasUuidColumn;

    protected $fillable = [
        'name', 'starts_at', 'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'date',
        'ends_at' => 'date',
    ];

    public static function current(): ?ZeurMeister
    {
        $currentDate = now();

        return static::where('starts_at', '<=', $currentDate)
            ->where('ends_at', '>=', $currentDate)
            ->first();
    }
}
