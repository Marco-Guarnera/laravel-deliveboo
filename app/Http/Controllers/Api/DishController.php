<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller
{
    // Index
    public function index()
    {
        $dishes_list = Dish::all();
        return response()->json(
            [
            'success' => true,
            'results' => $dishes_list
            ]
        );
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            ]
        );

        $dish = Dish::create($data);

        return response()->json($dish, 201);
    }

    public function update(Request $request, Dish $dish)
    {
        $data = $request->validate(
            [
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            ]
        );

        $dish->update($data);

        return response()->json($dish);
    }

    public function destroy(Dish $dish)
    {
        $dish->delete();

        return response()->json(['success' => true]);
    }
}
