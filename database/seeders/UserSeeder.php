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
                'email' => 'donerkebab@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kebabplace@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'pizzamania@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'labellanapoli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'chinatown@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'dragongarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'sushiyama@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'giapponesedeli@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'tacofiesta@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'elmexicano@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'kbbq@example.com',
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
                'email' => 'indianohouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastburger@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'burgerhouse@example.com',
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
                'email' => 'smokehouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'bbqpit@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastfoodplace@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'quickbite@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'vegandelight@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'greenbites@example.com',
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
                'email' => 'pizzaandbarbecuespot@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'chineseanddragongarden@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'japaneseandtacofiesta@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'mexicanandsteakhouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'koreanandveganplace@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'indianandglutenfreehub@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'hamburgerandpizzahouse@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'steakhouseandfastfood@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'barbecueandjapanesetavern@example.com',
                'password' => '12345678'
            ],

            [
                'email' => 'mexicanandvegancorner@example.com',
                'password' => '12345678'
            ]

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
