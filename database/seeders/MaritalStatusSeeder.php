<?php

namespace Database\Seeders;

use App\Models\MaritalStatus;
use Illuminate\Database\Seeder;

class MaritalStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $marital_statuses = [
            [
                'title' => 'Married',
            ],
            [
                'title' => 'Unmarried',
            ],
        ];

        foreach ($marital_statuses as $marital_status) {
            MaritalStatus::firstOrCreate($marital_status);
        }
    }
}
