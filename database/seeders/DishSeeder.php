<?php

namespace Database\Seeders;

use App\Models\Dish;
use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Dish::factory()->count(25)->create();


        // Retrieve all dish IDs
        $dishIds = Dish::pluck('id');

        // Retrieve all restaurants
        $restaurants = Restaurant::all();

        foreach ($restaurants as $restaurant) {
            // Generate a random number of dishes between 7 and 15
            $randomDishCount = rand(7, 15);

            // Select random dish IDs from the available dishes
            $randomDishes = $dishIds->random($randomDishCount);

            // Associate the selected dishes with the current restaurant
            $restaurant->dishes()->sync($randomDishes);
        }
    }
}
