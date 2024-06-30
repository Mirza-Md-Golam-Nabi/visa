<?php

namespace App\Enums;

enum LicenseTypeEnum: string {
    case HEAVY = 'heavy';
    case MEDIUM = 'medium';
    case LIGHT = 'light';
    case MOTORCYCLE = 'motorcycle';
    case THREE_WHEELERS = 'three_wheelers';
    case PSV = 'psv';
    case OTHER = 'other';

    public function description(): string
    {
        return match ($this) {
            self::HEAVY => 'Heavy',
            self::MEDIUM => 'Medium',
            self::LIGHT => 'Light',
            self::MOTORCYCLE => 'Motorcycle',
            self::THREE_WHEELERS => 'Three-Wheelers',
            self::PSV => 'PSV',
            self::OTHER => 'Other',
        };
    }

}
