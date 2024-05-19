<?php

namespace App\Enum;

enum LicenseTypeEnum: string {
    case HEAVY = 'Heavy';
    case MEDIUM = 'Medium';
    case LIGHT = 'Light';
    case MOTORCYCLE = 'Motorcycle';
    case THREE_WHEELERS = 'Three-Wheelers';
    case PSV = 'PSV';
    case OTHER = 'Other';
}
