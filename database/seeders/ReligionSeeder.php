<?php

namespace Database\Seeders;

use App\Models\Religion;
use Illuminate\Database\Seeder;

class ReligionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $religions = [
            [
                'title' => 'Muslim',
            ],
            [
                'title' => 'Non-muslim',
            ],
        ];

        foreach ($religions as $religion) {
            Religion::create($religion);
        }
    }
}
