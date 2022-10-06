<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PollSubmission extends Model
{
    use HasFactory;

    public function poll(): BelongsTo
    {
        return $this->belongsTo(Poll::class);
    }

    public function answer(): BelongsTo
    {
        return $this->belongsTo(PollAnswer::class);
    }
}
