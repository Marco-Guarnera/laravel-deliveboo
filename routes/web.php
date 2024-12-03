<?php

use App\Http\Controllers\Admin\DishController as AdminDishController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Dishes
Route::prefix('/admin')->name('admin.dishes.')->group(function() {
    // Index
    Route::get('/dishes', [AdminDishController::class, 'index'])->name('index');
    // Show
    Route::get('/dishes/{dish}', [AdminDishController::class, 'show'])->name('show');
});
