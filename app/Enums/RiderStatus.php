<?php

namespace App\Enums;

enum RiderStatus: string
{
    case JOINED = 'joined';
    case CANCELLED = 'cancelled';
    case ATTENDED = 'attended';
    case NO_SHOW = 'no-show';
}
