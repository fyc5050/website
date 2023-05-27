<?php

namespace App\Actions;

use App\Enums\DesMutationState;
use App\Models\User;

class CreateDesMutation
{
    public function __construct(
        private readonly User $user,
        private readonly User $createdBy,
        private readonly int $mutation
    ) {
        //
    }

    public function execute(): void
    {
        // The mutation must be a value between [-1, inf)
        $mutation = max(-1, $this->mutation);

        // Create the des mutation
        $desMutation = $this->user->desMutations()->make([
            'state' => DesMutationState::PENDING,
            'mutation' => $mutation,
        ]);

        $desMutation->createdBy()->associate($this->createdBy);
        $desMutation->save();

        // If the createdBy user is a des manager, instantly approve.
        if ($this->createdBy->is_des_manager) {
            (new ApproveDesMutation($desMutation, $this->createdBy))->execute();
        }
    }
}
