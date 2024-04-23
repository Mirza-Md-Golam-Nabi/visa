<?php

namespace Database\Seeders;

use App\Models\Gender;
use Illuminate\Database\Seeder;

class GenderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $genders = [
            [
                'title' => 'Male',
            ],
            [
                'title' => 'Female',
            ],
        ];

        foreach ($genders as $gender) {
            Gender::firstOrCreate($gender);
        }
    }
}
