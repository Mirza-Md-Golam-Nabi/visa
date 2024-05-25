<?php

namespace App\Enum;

enum GenderEnum: string {
    case MALE = 'male';
    case FEMALE = 'female';
    case OTHERS = 'others';

    public function description(): string
    {
        return match ($this) {
            self::MALE => 'Male',
            self::FEMALE => 'Female',
            self::OTHERS => 'Others',
        };
    }
}
