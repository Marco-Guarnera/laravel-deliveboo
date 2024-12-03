<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // restaurants data
        $restaurants = [
            [
                'name' => 'Kebab House',
                'address' => 'Via Roma 10, Milano',
                'piva' => '12345678901',
                'logo' => 'https://example.com/images/kebab_house.jpg',
            ],
            [
                'name' => 'La Bella Napoli',
                'address' => 'Via Napoli 20, Napoli',
                'piva' => '12345678902',
                'logo' => 'https://example.com/images/bella_napoli.jpg',
            ],
            [
                'name' => 'Dragon Garden',
                'address' => 'Corso Vittorio 15, Roma',
                'piva' => '12345678903',
                'logo' => 'https://example.com/images/dragon_garden.jpg',
            ],
            [
                'name' => 'Sushi Yama',
                'address' => 'Piazza Venezia 5, Torino',
                'piva' => '12345678904',
                'logo' => 'https://example.com/images/sushi_yama.jpg',
            ],
            [
                'name' => 'El Mexicano',
                'address' => 'Via Libertà 12, Bologna',
                'piva' => '12345678905',
                'logo' => 'https://example.com/images/el_mexicano.jpg',
            ],
            [
                'name' => 'Seoul Spice',
                'address' => 'Via Garibaldi 8, Firenze',
                'piva' => '12345678906',
                'logo' => 'https://example.com/images/seoul_spice.jpg',
            ],
            [
                'name' => 'Taj Mahal',
                'address' => 'Via del Sole 18, Palermo',
                'piva' => '12345678907',
                'logo' => 'https://example.com/images/taj_mahal.jpg',
            ],
            [
                'name' => 'Burger House',
                'address' => 'Via Vittoria 22, Venezia',
                'piva' => '12345678908',
                'logo' => 'https://example.com/images/burger_house.jpg',
            ],
            [
                'name' => 'Texas Grill',
                'address' => 'Via Dante 3, Verona',
                'piva' => '12345678909',
                'logo' => 'https://example.com/images/texas_grill.jpg',
            ],
            [
                'name' => 'BBQ Pit',
                'address' => 'Piazza Duomo 2, Siena',
                'piva' => '12345678910',
                'logo' => 'https://example.com/images/bbq_pit.jpg',
            ],
            [
                'name' => 'Fast Burger',
                'address' => 'Corso Italia 30, Bari',
                'piva' => '12345678911',
                'logo' => 'https://example.com/images/fast_burger.jpg',
            ],
            [
                'name' => 'Green Bites',
                'address' => 'Via Piave 16, Ancona',
                'piva' => '12345678912',
                'logo' => 'https://example.com/images/green_bites.jpg',
            ],
            [
                'name' => 'NoGlut',
                'address' => 'Via Verdi 14, Catania',
                'piva' => '12345678913',
                'logo' => 'https://example.com/images/no_glut.jpg',
            ],
        ];


        foreach ($restaurants as $data) {

            $restaurant = Restaurant::create([
                'name' => $data['name'],
                'address' => $data['address'],
                'piva' => $data['piva'],
                'logo' => $data['logo'],
                'user_id' => 1
            ]);
        }
    }
}
