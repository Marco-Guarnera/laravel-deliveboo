<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Restaurant;
use Illuminate\Http\Request;

class RestaurantController extends Controller
{
    public function index(Request $request)
    {
        $query = Restaurant::with('types');

        // Verifica se sono stati selezionati più tipi
        if ($request->has('types')) {
            // Esplode la lista di tipi separati da virgola in un array
            $types = explode(',', $request->types);

            foreach ($types as $type) {
                $query->whereHas('types', function ($query) use ($type) {
                    $query->where('id', $type);
                });
            }
        }

        // Recupera i ristoranti filtrati
        $restaurants = $query->paginate(10);

        return response()->json(
            [
            'success' => true,
            'results' => $restaurants,
            ]
        );
    }
}
