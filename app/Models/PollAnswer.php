<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollAnswer extends Model
{
    use HasFactory, HasUuidColumn;

    protected $fillable = [
        'name',
    ];

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }
}
