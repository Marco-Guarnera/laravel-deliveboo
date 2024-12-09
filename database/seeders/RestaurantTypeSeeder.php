<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // get all restaurant
        $restaurantType = [
            1 => 1, // Type ID 1: Kebab
            2 => 2, // Type ID 2: Pizza
            3 => 3, // Type ID 3: Chinese
            4 => 4, // Type ID 4: Japanese
            5 => 5, // Type ID 5: Mexican
            6 => 6, // Type ID 6: Korean
            7 => 7, // Type ID 7: Indian
            8 => 8, // Type ID 8: Burger
            9 => 9,  // Type ID 9: Steakhouse
            10 => 10, // Type ID 10: Barbecue
            11 => 11, // Type ID 11: Fast Food
            12 => 12, // Type ID 12: Vegan
            13 => 13, // Type ID 13: Gluten-Free
        ];

        foreach ($restaurantType as $restaurantId => $typeId) {
            // retrieve the restaurant by id
            $restaurant = Restaurant::find($restaurantId);

            // retrieve the type by id
            $type = Type::find($typeId);

            // if both the restaurant and type exist, associate them
            if ($restaurant && $type) {
                // sync the type to the restaurant
                $restaurant->types()->sync([$type->id]);
            } else {
                // log an error message in console (cli) if the restaurant or type is not found
                echo "error: restaurant id {$restaurantId} or type id {$typeId} not found\n";
            }
        }
    }
}
