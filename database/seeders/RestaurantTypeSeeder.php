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
        $filePath = database_path('seeders/csvs/restaurants_types_data.csv');

        if (($file = fopen($filePath, 'r')) !== false) {
            fgetcsv($file); // Salta l'intestazione del CSV

            while (($row = fgetcsv($file, 1000, ',')) !== false) {
                $restaurantId = (int) $row[0];
                $typeNames = array_map('trim', explode(', ', $row[1]));

                $typeIds = Type::whereIn('name', $typeNames)->pluck('id');

                Restaurant::find($restaurantId)->types()->sync($typeIds);
            }

            fclose($file);
        }
    }
}
