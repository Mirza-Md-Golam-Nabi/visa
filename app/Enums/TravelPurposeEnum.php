<?php

namespace App\Enums;

enum TravelPurposeEnum: string {
    case WORK = 'work';
    case TRANSIT = 'transit';
    case VISIT = 'visit';
    case UMRAH = 'umrah';
    case RESIDENCE = 'residence';
    case HAJJ = 'hajj';
    case DIPLOMACY = 'diplomacy';

    public function description(): string
    {
        return match ($this) {
            self::WORK => 'Work',
            self::TRANSIT => 'Transit',
            self::VISIT => 'Visit',
            self::UMRAH => 'Umrah',
            self::RESIDENCE => 'Residence',
            self::HAJJ => 'Hajj',
            self::DIPLOMACY => 'Diplomacy',
        };
    }
}
