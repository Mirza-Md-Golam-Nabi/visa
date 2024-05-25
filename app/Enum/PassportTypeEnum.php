<?php

namespace App\Enum;

enum PassportTypeEnum: string {
    case BUSINESS = 'business';
    case EXCLUSIVE = 'exclusive';
    case ORDINARY = 'ordinary';

    public function description(): string
    {
        return match ($this) {
            self::BUSINESS => 'Business',
            self::EXCLUSIVE => 'Exclusive',
            self::ORDINARY => 'Ordinary',
        };
    }
}
