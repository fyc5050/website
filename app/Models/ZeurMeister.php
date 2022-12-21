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
        // TODO
        return static::first();
    }
}
