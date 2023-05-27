<?php

namespace App\Actions;

use App\Enums\DesMutationState;
use App\Models\DesMutation;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ApproveDesMutation
{
    public function __construct(
      private readonly DesMutation $mutation,
      private readonly User $updatedBy
    ) {
        //
    }

    public function execute(): void
    {
        // The state must be pending to approve, and the user must be a des manager to approve.
        if ($this->mutation->state !== DesMutationState::PENDING || !$this->updatedBy->is_des_manager) {
            return;
        }

        $newDesCount = $this->mutation->user->des_count + $this->mutation->mutation;

        DB::transaction(function () use ($newDesCount) {
            $this->mutation->user->update([
                'des_count' => $newDesCount
            ]);

            $this->mutation->fill([
                'state' => DesMutationState::APPROVED,
                'count_after' => $newDesCount,
            ]);

            $this->mutation->statusUpdatedBy()->associate($this->updatedBy);
            $this->mutation->save();
        });
    }
}
