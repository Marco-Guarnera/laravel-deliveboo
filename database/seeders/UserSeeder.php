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
                'email' => 'kebabhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'donerkebab@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kebabgarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kebabdeli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'labellanapoli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'pizzamania@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'pizzadeli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'pizzagrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'dragongarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'chinatown@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'cinesegrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'cinesehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'sushiyama@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'tokyobites@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'giapponesehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'giapponesegarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'elmexicano@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'tacofiesta@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'messicanogrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'messicanogarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'seoulspice@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kbbq@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'coreanogrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'coreanohouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'tajmahal@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'currypalace@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'indianohouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'indianogarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'burgerhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastburger@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'hamburgergarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'hamburgerhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'texasgrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'steakco@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'steakhousehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'steakhousegrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'bbqpit@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'smokehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'barbecuehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'barbecuegrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'quickbite@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastfoodhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastfoodgrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastfoodgarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'greenbites@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'vegandelight@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'vegangarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'vegangrill@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'noglut@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'glutenfreehub@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'glutenfreedeli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'glutenfreehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kebabhouseseoulspice@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'currypalaceburgerhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'chinatownsmokehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'elmexicanokbbq@example.com',
                'password' => '12345678'
            ],


        ];

        foreach ($users as $userData) {
            User::create(
                [
                    'email' => $userData["email"],
                    'password' => Hash::make($userData["password"]),
                ]
            );
        }
    }
}
