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
                "email" => "info@kfc.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@burgerking.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@mcdonalds.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@tacobell.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@lapiadineria.com",
                "password" => "12345678"
            ],
            [
                "email" => "info@sushiexpress.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@kebabhouse.it",
                "password" => "12345678"
            ],
            [
                "email" => "info@damichele.net",
                "password" => "12345678"
            ],
        ];

        foreach ($users as $userData) {
            $user = new User();
            $user->email = $userData["email"];
            $user->password = Hash::make($userData["password"]);
            $user->save();
        }
    }
}
