<?php

namespace App\Models;

use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Poll extends Model
{
    use HasFactory, HasUuidColumn;

    protected $fillable = [
        'name', 'locks_at', 'is_published',
    ];

    protected $casts = [
        'locks_at' => 'datetime',
        'is_published' => 'boolean',
    ];

    public function isLocked(): bool
    {
        return $this->locks_at !== null && $this->locks_at <= now();
    }

    public function publish()
    {
        $this->update([
            'is_published' => true,
        ]);
    }

    public function unpublish()
    {
        $this->update([
            'is_published' => false,
        ]);
    }

    public function answers(): HasMany
    {
        return $this->hasMany(PollAnswer::class);
    }

    public function submissions(): HasMany
    {
        return $this->hasMany(PollSubmission::class);
    }
}
