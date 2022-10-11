<?php

namespace App\Policies;

use App\Models\Poll;
use App\Models\PollSubmission;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class PollSubmissionPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view the model.
     *
     * @param  \App\Models\User  $user
     * @param  \App\Models\PollSubmission  $pollSubmission
     * @return \Illuminate\Auth\Access\Response|bool
     */
    public function view(User $user, PollSubmission $pollSubmission)
    {
        //
    }

    /**
     * Determine whether the user can create models.
     *
     * @param \App\Models\User|null $user
     * @param \App\Models\Poll $poll
     * @return bool
     */
    public function create(?User $user, Poll $poll): bool
    {
        return !$poll->isLocked()
            && !$poll->submissions()->where('session_id', session()->getId())->exists();
    }
}
