<?php

namespace App\Enum;

enum AgentGroupEnum: string {
    case RECRUITING = 'recruiting';
    case HAJJ = 'hajj';
    case TRAVEL = 'travel';
    case UMRAH = 'umrah';
    case OTHERS = 'others';
    case SALARY = 'salary';
    case TICKET = 'ticket';

    public function description(): string
    {
        return match ($this) {
            self::RECRUITING => 'Recruiting',
            self::HAJJ => 'Hajj',
            self::TRAVEL => 'Travel',
            self::UMRAH => 'Umrah',
            self::OTHERS => 'Others',
            self::SALARY => 'Salary',
            self::TICKET => 'Ticket',
        };
    }
}
