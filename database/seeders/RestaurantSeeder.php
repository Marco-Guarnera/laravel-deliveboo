<?php

namespace Database\Seeders;

use App\Models\Restaurant;
use App\Models\Type;
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
                'user_id' => 1,
            ],
            [
                'name' => 'La Bella Napoli',
                'address' => 'Via Napoli 20, Napoli',
                'piva' => '12345678902',
                'logo' => 'https://example.com/images/bella_napoli.jpg',
                'user_id' => 2,
            ],
            [
                'name' => 'Dragon Garden',
                'address' => 'Corso Vittorio 15, Roma',
                'piva' => '12345678903',
                'logo' => 'https://example.com/images/dragon_garden.jpg',
                'user_id' => 3,
            ],
            [
                'name' => 'Sushi Yama',
                'address' => 'Piazza Venezia 5, Torino',
                'piva' => '12345678904',
                'logo' => 'https://example.com/images/sushi_yama.jpg',
                'user_id' => 4,
            ],
            [
                'name' => 'El Mexicano',
                'address' => 'Via Libertà 12, Bologna',
                'piva' => '12345678905',
                'logo' => 'https://example.com/images/el_mexicano.jpg',
                'user_id' => 5,
            ],
            [
                'name' => 'Seoul Spice',
                'address' => 'Via Garibaldi 8, Firenze',
                'piva' => '12345678906',
                'logo' => 'https://example.com/images/seoul_spice.jpg',
                'user_id' => 6,
            ],
            [
                'name' => 'Taj Mahal',
                'address' => 'Via del Sole 18, Palermo',
                'piva' => '12345678907',
                'logo' => 'https://example.com/images/taj_mahal.jpg',
                'user_id' => 7,
            ],
            [
                'name' => 'Burger House',
                'address' => 'Via Vittoria 22, Venezia',
                'piva' => '12345678908',
                'logo' => 'https://example.com/images/burger_house.jpg',
                'user_id' => 8,
            ],
            [
                'name' => 'Texas Grill',
                'address' => 'Via Dante 3, Verona',
                'piva' => '12345678909',
                'logo' => 'https://example.com/images/texas_grill.jpg',
                'user_id' => 9,
            ],
            [
                'name' => 'BBQ Pit',
                'address' => 'Piazza Duomo 2, Siena',
                'piva' => '12345678910',
                'logo' => 'https://example.com/images/bbq_pit.jpg',
                'user_id' => 10,
            ],
            [
                'name' => 'Fast Burger',
                'address' => 'Corso Italia 30, Bari',
                'piva' => '12345678911',
                'logo' => 'https://example.com/images/fast_burger.jpg',
                'user_id' => 11,
            ],
            [
                'name' => 'Green Bites',
                'address' => 'Via Piave 16, Ancona',
                'piva' => '12345678912',
                'logo' => 'https://example.com/images/green_bites.jpg',
                'user_id' => 12,
            ],
            [
                'name' => 'NoGlut',
                'address' => 'Via Verdi 14, Catania',
                'piva' => '12345678913',
                'logo' => 'https://example.com/images/no_glut.jpg',
                'user_id' => 13,
            ],
        ];


        foreach ($restaurants as $data) {
            Restaurant::create(
                [
                'name' => $data['name'],
                'address' => $data['address'],
                'piva' => $data['piva'],
                'logo' => $data['logo'],
                'user_id' => $data['user_id'],
                ]
            );
        }
    }
}
