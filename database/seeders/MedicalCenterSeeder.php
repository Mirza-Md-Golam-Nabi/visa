<?php

namespace Database\Seeders;

use App\Models\MedicalCenter;
use Illuminate\Database\Seeder;

class MedicalCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $medicals = [
            'Al Nahda Medical Center',
            'Iiro Medical Check Up & Diagnostic Center',
            'A Rahman Medical',
            'A. Rahman Medical Center',
            'Abc Diagnostic Center',
        ];

        foreach ($medicals as $medical) {
            MedicalCenter::firstOrCreate(['name' => $medical]);
        }
    }
}
