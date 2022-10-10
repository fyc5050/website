<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory, HasUuidColumn;

    protected $fillable = [
        'content', 'said_by', 'is_hidden',
    ];

    protected $casts = [
        'is_hidden' => 'boolean',
    ];

    public function scopeHidden(Builder $query): void
    {
        $query->where('is_hidden', true);
    }

    public function scopeShown(Builder $query): void
    {
        $query->where('is_hidden', false);
    }
}
