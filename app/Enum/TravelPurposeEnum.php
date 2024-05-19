<?php

namespace App\Enum;

enum TravelPurposeEnum: string {
    case WORK = 'Work';
    case TRANSIT = 'Transit';
    case VISIT = 'Visit';
    case UMRAH = 'Umrah';
    case RESIDENCE = 'Residence';
    case HAJJ = 'Hajj';
    case DIPLOMACY = 'Diplomacy';
}
