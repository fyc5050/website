<?php

namespace App\Actions;

use App\Enums\DesMutationState;
use App\Models\DesMutation;
use App\Models\User;

class DeclineDesMutation
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

        $this->mutation->fill([
            'state' => DesMutationState::DECLINED,
        ]);

        $this->mutation->statusUpdatedBy()->associate($this->updatedBy);
        $this->mutation->save();
    }
}
