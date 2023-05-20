<?php

namespace App\Models;

use App\Enums\DesMutationState;
use App\Traits\HasUuidColumn;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\DB;

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

    public function approve(User $approvedBy): void
    {
        DB::transaction(function () use ($approvedBy) {
            $newCount = $this->user->des_count + $this->mutation;

            $this->user->update([
                'des_count' => $newCount,
            ]);

            $this->statusUpdatedBy()->associate($approvedBy);
            $this->state = DesMutationState::APPROVED;
            $this->count_after = $newCount;

            $this->save();
        });
    }

    public function decline(User $approvedBy): void
    {
        $this->statusUpdatedBy()->associate($approvedBy);
        $this->state = DesMutationState::DECLINED;

        $this->save();
    }
}
