<?php

use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\RestaurantController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Index
Route::get('/dishes', [DishController::class, 'index'])->name('api.dishes.index');

// API endpoint to list all restaurants
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('api.restaurants.index');


Route::post('/dishes', [DishController::class, 'store']);
Route::put('/dishes/{dish}', [DishController::class, 'update']);
Route::delete('/dishes/{dish}', [DishController::class, 'destroy']);


use App\Http\Controllers\Api\TypeController;

Route::get('/types', [TypeController::class, 'index']);


Route::get('restaurants/{restaurantId}/dishes', [RestaurantController::class, 'getDishes']);
Route::get('/restaurants/{restaurantId}', [RestaurantController::class, 'show'])->name('api.restaurants.show');
