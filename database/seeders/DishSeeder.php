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

        $filePath = database_path('seeders/csvs/dishes_data.csv');
        $file = fopen($filePath, 'r');


        $tableColumns = fgetcsv($file);


        while (($row = fgetcsv($file)) !== false) {
            $dishData = [
                'name' => $row[array_search('name', $tableColumns)],
                'description' => $row[array_search('description', $tableColumns)],
                'price' => $row[array_search('price', $tableColumns)],
                'is_visible' => $row[array_search('is_visible', $tableColumns)] === '1',
                'img' => $row[array_search('img', $tableColumns)],
                'restaurant_id' => $row[array_search('restaurant_id', $tableColumns)],
            ];

            Dish::create($dishData);
        }

        fclose($file);
    }
}
