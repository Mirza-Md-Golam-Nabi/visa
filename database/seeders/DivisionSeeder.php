<?php

namespace Database\Seeders;

use App\Models\Division;
use Illuminate\Database\Seeder;

class DivisionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $divisions = [
            'Barisal',
            'Chittagong',
            'Dhaka',
            'Khulna',
            'Rajshahi',
            'Rangpur',
            'Sylhet',
            'Mymensingh',
        ];

        foreach ($divisions as $division) {
            Division::firstOrCreate(['name' => $division]);
        }
    }
}
