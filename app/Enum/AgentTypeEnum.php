<?php

namespace App\Enum;

enum AgentTypeEnum: string {
    case SERVICE_AGENT = 'service_agent';
    case PASSENGER_AGENT = 'passenger_agent';

    public function description(): string
    {
        return match ($this) {
            self::SERVICE_AGENT => 'Service Agent',
            self::PASSENGER_AGENT => 'Passenger Agent',
        };
    }
}
