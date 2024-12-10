<?php

use App\Http\Controllers\Admin\DishController as AdminDishController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\TypeController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('types', [TypeController::class, 'index']);

// Dishes
Route::prefix('/admin')->name('admin.dishes.')->group(function () {
    // Create
    Route::get('/dishes/create', [AdminDishController::class, 'create'])->name('create');
    // Store
    Route::post('/dishes', [AdminDishController::class, 'store'])->name('store');
    // Index
    Route::get('/dishes', [AdminDishController::class, 'index'])->name('index');
    // Show
    Route::get('/dishes/{dish}', [AdminDishController::class, 'show'])->name('show');
    // Edit
    Route::get('/dishes/{dish}/edit', [AdminDishController::class, 'edit'])->name('edit');
    // Update
    Route::put('/dishes/{dish}', [AdminDishController::class, 'update'])->name('update');
    // Delete
    Route::delete('/dishes/{dish}', [AdminDishController::class, 'destroy'])->name('delete');
});

Route::prefix('/admin')->name('admin.orders.')->group(function () {

    // Orders
    Route::get('/orders', [AdminOrderController::class, 'index'])->name('index');
});
