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
        Dish::factory()->count(200)->create();

        // get all dish IDs
        $dishIds = Dish::pluck('id');

        // get all restaurants
        $restaurants = Restaurant::all();

        // assign random dishes to each restaurant
        foreach ($restaurants as $restaurant) {
            // generate a random number of dishes (7 to 15)
            $randomDishCount = rand(7, 15);

            // pick random dishes from the dish IDs
            $selectedDishes = $dishIds->random($randomDishCount);

            // assign each selected dish to the current restaurant
            foreach ($selectedDishes as $dishId) {
                // find the dish by ID
                $dish = Dish::find($dishId);

                // link the dish to the restaurant
                $dish->restaurant_id = $restaurant->id;

                // save the dish with the restaurant ID
                $dish->save();
            }
        }
    }
}
