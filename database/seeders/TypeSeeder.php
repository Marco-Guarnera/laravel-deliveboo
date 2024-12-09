<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $typeNames = [

            "Kebab",
            "Pizza",
            "Cinese",
            "Giapponese",
            "Messicano",
            "Coreano",
            "Indiano",
            "Hamburger",
            "Steak house",
            "Barbecue",
            "Fast Food",
            "Vegan",
            "Gluten free"
        ];

        foreach ($typeNames as $singleType) {
            $newType = new Type();
            $newType->name = $singleType;
            $newType->save();
        }
    }
}
