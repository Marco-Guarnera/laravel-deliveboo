<?php

use App\Http\Controllers\Api\CheckoutController;
use App\Http\Controllers\Api\DishController;
use App\Http\Controllers\Api\OrderController;
use App\Http\Controllers\Api\RestaurantController;
use App\Http\Controllers\Api\TypeController;
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

// Index dei piatti
Route::get('/dishes', [DishController::class, 'index'])->name('api.dishes.index');

// Creazione di un ordine
Route::post('/orders', [OrderController::class, 'store'])->name('api.orders.store');

// Elenco di tutti i ristoranti
Route::get('/restaurants', [RestaurantController::class, 'index'])->name('api.restaurants.index');

// Dettagli di un singolo ristorante
Route::get('/restaurants/{restaurantId}', [RestaurantController::class, 'show'])->name('api.restaurants.show');

// Piatti per un singolo ristorante
Route::get('restaurants/{restaurantId}/dishes', [RestaurantController::class, 'getDishes']);

// Aggiungere, aggiornare ed eliminare piatti
Route::post('/dishes', [DishController::class, 'store']);
Route::put('/dishes/{dish}', [DishController::class, 'update']);
Route::delete('/dishes/{dish}', [DishController::class, 'destroy']);

// Tipi di piatti
Route::get('/types', [TypeController::class, 'index']);

// Checkout
Route::get('/checkout/token', [CheckoutController::class, 'generateToken']);
Route::post('/checkout/pay', [CheckoutController::class, 'processPayment']);

// Dettagli di un singolo piatto
Route::get('/dishes/{id}', [DishController::class, 'show']);

// Dettagli di un singolo ristorante
Route::get('/restaurants/{id}', [RestaurantController::class, 'show']);
