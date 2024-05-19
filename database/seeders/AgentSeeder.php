<?php

namespace Database\Seeders;

use App\Models\Agent;
use Illuminate\Database\Seeder;

class AgentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $agents_json = '[
            {
                "agent_type": "service_agent",
                "agent_group": "Recruiting",
                "name": "Mirza Md. Golam Nabi",
                "nid_no": "1234567890",
                "gender": "Male",
                "father_name": "Mirza Md. Forhad Hossain",
                "mother_name": "Mst. Nurunnahar Begum",
                "village_house": "Rupdia",
                "road_block_sector": "Eagle Pump",
                "country": "Bangladesh",
                "division_id": "4",
                "district_id": "57",
                "police_station": "Jessore Sadar",
                "email": "golamnabi411330@gmail.com",
                "post_office": "Rupdia",
                "contact_no": "01825712671",
                "emergency_name_phone": "Name = Forhad Hossain(father) & Mobile = 01912842292"
            },
            {
                "agent_type": "passenger_agent",
                "agent_group": "Hajj",
                "name": "MST. Feroza Khatun",
                "nid_no": "9856321470",
                "gender": "Female",
                "father_name": "Mirza Md. Forhad Hossain",
                "mother_name": "Mst. Nurunnahar Begum",
                "village_house": "Rupdia",
                "road_block_sector": "Eagle Pump",
                "country": "Bangladesh",
                "division_id": "4",
                "district_id": "57",
                "police_station": "Jessore Sadar",
                "email": "feroza@gmail.com",
                "post_office": "Rupdia",
                "contact_no": "01935272950",
                "emergency_name_phone": "Name = Forhad Hossain(father) & Mobile = 01912842292"
            }
        ]';

        $agents = json_decode($agents_json, true);

        foreach ($agents as $agent) {
            Agent::firstOrCreate($agent);
        }
    }
}
