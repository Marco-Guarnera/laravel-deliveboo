<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DishRequest;
use App\Models\Dish;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DishController extends Controller
{
    public function __construct()
    {
        // ensure user authentication for all actions
        $this->middleware('auth');
    }

    /**
     * display the form for creating a new dish
     */
    public function create()
    {
        $this->authorize('create', Dish::class);

        $dish = new Dish();
        return view('admin.dishes.create', compact('dish'));
    }

    /**
     * store a new dish in the database
     */
    public function store(DishRequest $request)
    {
        $this->authorize('create', Dish::class);

        // validate the request data
        $data_list = $request->validated();

        // get the first restaurant associated with the authenticated user
        $restaurant = auth()->user()->restaurants->first();

        // assign the restaurant id to the dish data
        $data_list['restaurant_id'] = $restaurant->id;

        // store the image if provided
        if ($request->hasFile('img')) {
            $file_path = Storage::disk('public')->put('img/dishes/', $request->img);
            $data_list['img'] = $file_path;
        }

        // create a new dish using the provided data
        Dish::create($data_list);

        // redirect to the dishes index page
        return redirect()->route('admin.dishes.index')->with('status', 'Created!')
            ->with('alert-class', 'success');
    }

    /**
     * display a list of dishes grouped by the user's restaurants
     */
    public function index()
    {
        // get the currently authenticated user
        $user = auth()->user();

        // retrieve the user's restaurants with their related dishes using eager loading
        $restaurants = $user->restaurants()->with('dishes')->get();

        // pass the retrieved data (restaurants and their dishes) to the view
        return view('admin.dishes.index', compact('restaurants'));
    }

    /**
     * display the specified dish
     */
    public function show(Dish $dish)
    {
        $this->authorize('view', $dish);

        return view('admin.dishes.show', compact('dish'));
    }

    /**
     * show the form for editing the specified dish
     */
    public function edit(Dish $dish)
    {
        $this->authorize('view', $dish);

        return view('admin.dishes.edit', compact('dish'));
    }

    public function update(DishRequest $request, Dish $dish)
    {
        $this->authorize('update', $dish);

        // validate the request data
        $data_list = $request->validated();

        // handle image update if a new file is provided
        if ($request->hasFile('img')) {
            if ($dish->img) {
                Storage::disk('public')->delete($dish->img);
            }
            $file_path = Storage::disk('public')->put('img/dishes/', $request->img);
            $data_list['img'] = $file_path;
        }

        // update the dish with the new data
        $dish->update($data_list);

        // redirect to the dishes index page
        return redirect()->route('admin.dishes.index')->with('status', 'Updated!')
            ->with('alert-class', 'success');
    }

    public function destroy(Dish $dish)
    {
        $this->authorize('delete', $dish);

        // delete the dish record
        $dish->delete();

        // redirect to the dishes index page
        return redirect()->route('admin.dishes.index')->with('status', 'Deleted!')
            ->with('alert-class', 'danger');
    }
}