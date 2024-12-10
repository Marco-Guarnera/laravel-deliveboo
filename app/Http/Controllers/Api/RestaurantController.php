<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        // Includi i tipi e il primo piatto associato al ristorante
        $query = Restaurant::with(['types', 'dishes' => function ($query) {
            $query->select('id', 'restaurant_id', 'img')->orderBy('id')->limit(1);
        }]);

        // Filtra i ristoranti in base ai tipi selezionati
        if ($request->has('types')) {
            $types = explode(',', $request->types);

            foreach ($types as $type) {
                $query->whereHas('types', function ($query) use ($type) {
                    $query->where('id', $type);
                });
            }
        }

        // Recupera i ristoranti filtrati con paginazione
        $restaurants = $query->paginate(12);

        return response()->json(
            [
                'success' => true,
                'results' => $restaurants,
            ]
        );
    }



    public function getDishes($restaurantId)
    {
        $restaurant = Restaurant::findOrFail($restaurantId);
        $dishes = $restaurant->dishes->map(function ($dish) {
            $dish->image_url = $dish->img ? asset('storage/' . ltrim($dish->img, '/')) : null;
            return $dish;
        });

        return response()->json([
            'success' => true,
            'results' => $dishes,
        ]);
    }

    public function show($restaurantId)
    {
        // Trova il ristorante con i suoi tipi associati
        $restaurant = Restaurant::with('types')->findOrFail($restaurantId);

        return response()->json([
            'success' => true,
            'results' => $restaurant,
        ]);
    }
}
