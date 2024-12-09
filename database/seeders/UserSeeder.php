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
                'email' => 'info@kebabhouse.com',
                'password' => '12345678'
            ],

            [
                'email' => 'pizzeria@bellanapoli.it',
                'password' => '12345678'
            ],

            [
                'email' => 'info@dragongarden.com',
                'password' => '12345678'
            ],

            [
                'email' => 'sushi@sushiyama.com',
                'password' => '12345678'
            ],

            [
                'email' => 'info@elmexicano.com',
                'password' => '12345678'
            ],

            [
                'email' => 'info@seoulspice.com',
                'password' => '12345678'
            ],

            [
                'email' => 'info@tajmahal.com',
                'password' => '12345678'
            ],

            [
                'email' => 'burger@burgerhouse.com',
                'password' => '12345678'
            ],

            [
                'email' => 'steakhouse@texasgrill.com',
                'password' => '12345678'
            ],

            [
                'email' => 'bbq@bbqpit.com',
                'password' => '12345678'
            ],

            [
                'email' => 'fastfood@fastburger.com',
                'password' => '12345678'
            ],

            [
                'email' => 'vegan@greenbites.com',
                'password' => '12345678'
            ],

            [
                'email' => 'glutenfree@noglut.com',
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
