<?php

namespace Database\Seeders;

use App\Models\Passenger;
use App\Models\Passport;
use Illuminate\Database\Seeder;

class PassengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $passenger_data = '[
            {
                "agent": "2",
                "passenger_name": "Mirza Md. Nurunnabi",
                "nid_no": "1114563210",
                "gender": "male",
                "dob": "1988-12-05",
                "father_name": "Mirza Md. Forhad Hossain",
                "mother_name": "MST. Nurunnahar Begum",
                "spouse_name": "MST. Roji",
                "religion": "muslim",
                "marital_status": "married",
                "target_country": "Saudi Arabia",
                "passenger_type": "recruiting",
                "village_house": "Rupdia",
                "division_id": "4",
                "district_id": "57",
                "police_station": "Jessore Sadar",
                "post_office": "Rupdia",
                "contact_no": "01611111111",
                "current_status": "new_file",
                "emergency_name_contact": "Name = Md. Forhad Hossain (father), Mobile = 01411111111",
                "recruiting_agent": "1"
            },
            {
                "agent": "2",
                "passenger_name": "Mirza Md. Rasel Ahmed",
                "nid_no": "1114563235",
                "gender": "male",
                "dob": "1988-12-05",
                "father_name": "Md. Robiul Al Ahmed",
                "mother_name": "MST. Ayesha Begum",
                "spouse_name": "MST. Salma",
                "religion": "muslim",
                "marital_status": "married",
                "target_country": "Saudi Arabia",
                "passenger_type": "recruiting",
                "village_house": "Rupdia",
                "division_id": "4",
                "district_id": "57",
                "police_station": "Jessore Sadar",
                "post_office": "Rupdia",
                "contact_no": "01611113333",
                "current_status": "new_file",
                "emergency_name_contact": "Name = Md. Robiul Al Ahmed (father), Mobile = 01411545454",
                "recruiting_agent": "1"
            }
        ]';

        $passengers = json_decode($passenger_data, true);

        $passport_data = '[
            {
                "previous_passport": "25412254",
                "passport_no": "12145263",
                "passport_type": "ordinary",
                "passport_issue_date": "2024-04-30",
                "passport_issue_place": "57",
                "passport_expire_date": "2028-12-30"
            },
            {
                "previous_passport": "25412885",
                "passport_no": "12174859",
                "passport_type": "ordinary",
                "passport_issue_date": "2024-04-30",
                "passport_issue_place": "57",
                "passport_expire_date": "2028-12-30"
            }
        ]';

        $passports = json_decode($passport_data, true);

        foreach ($passengers as $key => $passenger) {
            $pass = Passenger::firstOrCreate($passenger);
            Passport::firstOrCreate($passports[$key] + ['passenger_id' => $pass->id]);
        }
    }
}
