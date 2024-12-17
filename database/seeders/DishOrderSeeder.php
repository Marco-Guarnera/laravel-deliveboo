<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishOrderSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    $filePath = database_path('seeders/csvs/dish_order.csv');
    $file = fopen($filePath, 'r');

    // Leggi i nomi delle colonne
    $tableColumns = fgetcsv($file);

    // Popola la tabella "dish_order" con i dati dal CSV
    while (($row = fgetcsv($file)) !== false) {
      $dishOrderData = [
        'dish_id' => $row[array_search('dish_id', $tableColumns)],
        'order_id' => $row[array_search('order_id', $tableColumns)],
        'quantity' => $row[array_search('quantity', $tableColumns)],
        'price' => $row[array_search('price', $tableColumns)],
        'name' => $row[array_search('name', $tableColumns)],
      ];

      DB::table('dish_order')->insert($dishOrderData);
    }

    fclose($file);
  }
}
