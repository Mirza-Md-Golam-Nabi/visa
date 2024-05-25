<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\AgentSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\DivisionSeeder;
use Database\Seeders\MedicalCenterSeeder;
use Database\Seeders\MedicalSeeder;
use Database\Seeders\PassengerSeeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\VisaInfoSeeder;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            DivisionSeeder::class,
            DistrictSeeder::class,
            AgentSeeder::class,
            VisaInfoSeeder::class,
            PassengerSeeder::class,
            MedicalCenterSeeder::class,
            MedicalSeeder::class,
        ]);

    }
}
