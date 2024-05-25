<?php

namespace App\Enum;

enum ReligionEnum: string {
    case MUSLIM = 'muslim';
    case NON_MUSLIM = 'non_muslim';

    public function description(): string
    {
        return match ($this) {
            self::MUSLIM => 'Muslim',
            self::NON_MUSLIM => 'Non Muslim',
        };
    }
}
