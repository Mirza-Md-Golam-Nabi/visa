<?php

namespace App\Enum;

enum MaritalStatusEnum: string {
    case MARRIED = 'married';
    case UNMARRIED = 'unmarried';

    public function description(): string
    {
        return match ($this) {
            self::MARRIED => 'Married',
            self::UNMARRIED => 'Unmarried',
        };
    }
}
