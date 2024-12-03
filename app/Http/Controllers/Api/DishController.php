<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller {
    // Index
    public function index() {
        $dishes_list = Dish::all();
        return response()->json([
            'success' => true,
            'results' => $dishes_list
        ]);
    }
}
