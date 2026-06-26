<?php

namespace App\Enums;

enum PaceLevel: string
{
    case EASY = 'easy';
    case SOCIAL = 'social';
    case BRISK = 'brisk';
    case FAST = 'fast';
    case RACE = 'race';
}
