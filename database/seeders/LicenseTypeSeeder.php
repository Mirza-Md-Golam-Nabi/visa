<?php

namespace Database\Seeders;

use App\Models\LicenseType;
use Illuminate\Database\Seeder;

class LicenseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $license_types = [
            [
                'title' => 'Heavy',
            ],
            [
                'title' => 'Medium',
            ],
            [
                'title' => 'Light',
            ],
            [
                'title' => 'Motorcycle',
            ],
            [
                'title' => 'Three-Wheelers',
            ],
            [
                'title' => 'PSV',
            ],
            [
                'title' => 'Other',
            ],
        ];

        foreach ($license_types as $license_type) {
            LicenseType::firstOrCreate($license_type);
        }

    }
}
