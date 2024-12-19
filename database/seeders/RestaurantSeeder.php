<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/csvs/restaurants_data.csv');
        $file = fopen($filePath, 'r');
        $tableColumns = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $restaurantData = [
                'name' => $row[array_search('name', $tableColumns)],
                'address' => $row[array_search('address', $tableColumns)],
                'piva' => $row[array_search('piva', $tableColumns)],
                'logo' => $row[array_search('logo', $tableColumns)],
                'user_id' => $row[array_search('user_id', $tableColumns)],
            ];

            Restaurant::create($restaurantData);
        }

        fclose($file);
    }
}
