<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $filePath = database_path('seeders/csvs/orders_data.csv');
        $file = fopen($filePath, 'r');
        $tableColumns = fgetcsv($file);

        while (($row = fgetcsv($file)) !== false) {
            $orderData = [
                'id' => $row[array_search('id', $tableColumns)],
                'restaurant_id' => $row[array_search('restaurant_id', $tableColumns)],
                'customer_name' => $row[array_search('customer_name', $tableColumns)],
                'customer_email' => $row[array_search('customer_email', $tableColumns)],
                'customer_number' => $row[array_search('customer_number', $tableColumns)],
                'customer_address' => $row[array_search('customer_address', $tableColumns)],
                'total_price' => $row[array_search('total_price', $tableColumns)],
                'created_at' => $row[array_search('created_at', $tableColumns)],
            ];
            Order::create($orderData);
        }
        fclose($file);
    }
}