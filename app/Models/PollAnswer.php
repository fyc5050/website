<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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

    public function submissions(): HasMany
    {
        return $this->hasMany(PollSubmission::class);
    }
}
