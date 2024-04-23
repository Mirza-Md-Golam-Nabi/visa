<?php

namespace Database\Seeders;

use App\Models\TravelPurpose;
use Illuminate\Database\Seeder;

class TravelPurposeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $travel_purposes = [
            [
                'title' => 'Work',
            ],
            [
                'title' => 'Transit',
            ],
            [
                'title' => 'Visit',
            ],
            [
                'title' => 'Umrah',
            ],
            [
                'title' => 'Residence',
            ],
            [
                'title' => 'Hajj',
            ],
            [
                'title' => 'Diplomacy',
            ],
        ];

        foreach ($travel_purposes as $travel_purpose) {
            TravelPurpose::firstOrCreate($travel_purpose);
        }
    }
}
