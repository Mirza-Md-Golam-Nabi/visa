<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\GenderSeeder;
use Database\Seeders\MaritalStatusSeeder;
use Database\Seeders\ReligionSeeder;
use Database\Seeders\TravelPurposeSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            GenderSeeder::class,
            MaritalStatusSeeder::class,
            ReligionSeeder::class,
            TravelPurposeSeeder::class,
        ]);

    }
}
