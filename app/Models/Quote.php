<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
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
}
