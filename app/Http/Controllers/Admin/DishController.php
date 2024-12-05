<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    // Create
    public function create() {
        $dish = new Dish();
        return view('admin.dishes.create', compact('dish'));
    }

    // Store
    public function store(DishRequest $request) {
        $data_list = $request->validated();

        if ($request->hasFile('img')) {
            $file_path = Storage::disk('public')->put('img/dishes/', $request->img);
            $data_list['img'] = $file_path;
        }

        $dish = Dish::create($data_list);

        return redirect()->route('admin.dishes.index');
    }

    // Index
    public function index() {
        $dishes_list = Dish::orderBy('name', 'asc')->paginate(10);
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
    public function update(DishRequest $request, Dish $dish) {
        $data_list = $request->validated();

        if ($request->hasFile('img')) {
            if ($dish->img) Storage::disk('public')->delete($dish->img);
            $file_path = Storage::disk('public')->put('img/dishes/', $request->img);
            $data_list['img'] = $file_path;
        }

        $dish->update($data_list);

        return redirect()->route('admin.dishes.index');
    }

    // Delete
    public function destroy(Dish $dish) {
        $dish->delete();
        return redirect()->route('admin.dishes.index');
    }
}
