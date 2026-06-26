<?php

namespace App\Enums;

enum IsAgreeing: string
{
    case YES = 'yes';
    case MOSTLY = 'mostly';
    case MOSTLY_NOT = 'mostly not';
    case NO = 'no';
}
