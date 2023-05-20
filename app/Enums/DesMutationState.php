<?php

namespace App\Enums;

enum DesMutationState: string
{
    case PENDING = 'pending';
    case APPROVED = 'approved';
    case DECLINED = 'declined';
}
