<?php

namespace App\Enums;

enum VisaStampEnum: string {
    case NO = 'no';
    case YES = 'yes';

    public function description(): string
    {
        return match ($this) {
            self::NO => 'No',
            self::YES => 'Yes',
        };
    }
}
