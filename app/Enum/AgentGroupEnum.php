<?php

namespace App\Enum;

enum AgentGroupEnum: string {
    case RECRUITING = 'Recruiting';
    case HAJJ = 'Hajj';
    case TRAVEL = 'Travel';
    case UMRAH = 'Umrah';
    case OTHERS = 'Others';
    case SALARY = 'Salary';
    case TICKET = 'Ticket';
}
