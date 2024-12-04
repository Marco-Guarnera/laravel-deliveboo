<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dish;
use Illuminate\Http\Request;

class DishController extends Controller {
    // Create
    public function create() {
        $dish = new Dish();
        return view('admin.dishes.create', compact('dish'));
    }

    // Store
    public function store(Request $request) {
        $data_list = $request->all();
        $dish = Dish::create($data_list);
        return redirect()->route('admin.dishes.index');
    }

    // Index
    public function index() {
        $dishes_list = Dish::paginate(10);
        return view('admin.dishes.index', compact('dishes_list'));
    }

    // Show
    public function show(Dish $dish) {
        return view('admin.dishes.show', compact('dish'));
    }

    // Edit
    public function edit(Dish $dish) {
        return view('admin.dishes.edit', compact('dish'));
    }

    // Update
    public function update(Request $request, Dish $dish) {
        $data_list = $request->all();
        $dish->update($data_list);
        return redirect()->route('admin.dishes.index');
    }
}
