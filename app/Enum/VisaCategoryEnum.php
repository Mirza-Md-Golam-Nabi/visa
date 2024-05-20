<?php

namespace App\Enum;

enum VisaCategoryEnum: string {
    case NORMAL_FACTOR = 'normal_factor';
    case HOUSE_WORKER = 'house_worker';
    case LOAD_AND_UNLOAD_WORKER = 'load_and_unload_worker';
    case HOME_WORKER = 'home_worker';
    case HOUSE_DRIVER = 'house_driver';
    case AGRICULTURAL_WORKER = 'agricultural_worker';

    public function description() {
        return match ($this) {
            self::NORMAL_FACTOR => 'Normal Factor',
            self::HOUSE_WORKER => 'House Worker',
            self::LOAD_AND_UNLOAD_WORKER => 'Load And Unload Worker',
            self::HOME_WORKER => 'Home Worker',
            self::HOUSE_DRIVER => 'House Driver',
            self::AGRICULTURAL_WORKER => 'Agricultural Worker',
        };
    }
}
