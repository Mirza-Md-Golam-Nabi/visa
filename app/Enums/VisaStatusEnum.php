<?php

namespace App\Enums;

enum VisaStatusEnum: string {
    case ACTIVE = 'active';
    case CANCEL = 'cancel';
    case RETURN = 'return';

    public function description(): string
    {
        return match ($this) {
            self::ACTIVE => 'Active',
            self::CANCEL => 'Cancel',
            self::RETURN => 'Return',
        };
    }
}
