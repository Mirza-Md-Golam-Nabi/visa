<?php

namespace Database\Seeders;

use App\Models\VisaInfo;
use Illuminate\Database\Seeder;

class VisaInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $visa_data = '[
            {
                "country": "Saudi Arabia",
                "passenger_agent_id": "2",
                "service_agent_id": "1",
                "visa_no": "KL 142 AWE 225",
                "category": "house_driver",
                "quantity": "5",
                "sponsor_id": "987456",
                "group_no": "778",
                "copile_name_arabic": "test",
                "comment": "Test Visa"
            }
        ]';

        $visas = json_decode($visa_data, true);

        foreach ($visas as $visa) {
            VisaInfo::firstOrCreate($visa);
        }
    }
}
