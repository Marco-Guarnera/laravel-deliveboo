<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller {
    // Index
    public function index() {
        $dishes_list = Dish::all();
        return view('admin.dishes.index', compact('dishes_list'));
    }
}
