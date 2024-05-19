<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                "name" => "Administrator",
                "email" => "admin@gmail.com",
                "password" => Hash::make('12345678'),
            ],
            [
                "name" => "Mirza Md. Golam Nabi",
                "email" => "golamnabi411330@gmail.com",
                "password" => Hash::make('12345678'),
            ],
        ];

        foreach ($users as $user) {
            User::firstOrCreate($user);
        }
    }
}
