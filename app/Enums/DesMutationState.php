<?php

namespace App\Enums;

enum DesMutationState: string
{
    // The mutation has been submitted but has not been reviewed.
    case PENDING = 'pending';

    // The mutation has been reviewed and was approved.
    case APPROVED = 'approved';

    // The mutation has been reviewed, but was declined.
    case DECLINED = 'declined';
}
