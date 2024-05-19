<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Database\Seeders\AgentSeeder;
use Database\Seeders\DistrictSeeder;
use Database\Seeders\DivisionSeeder;
use Database\Seeders\UserSeeder;
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
        ]);

    }
}
