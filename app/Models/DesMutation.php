<?php

namespace App\Models;

use App\Enums\DesMutationState;
use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DesMutation extends Model
{
    use HasFactory, HasUuidColumn;

    protected $fillable = [
        'state', 'mutation', 'count_after',
    ];

    protected $casts = [
        'state' => DesMutationState::class,
        'mutation' => 'integer',
        'count_after' => 'integer',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function statusUpdatedBy(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
