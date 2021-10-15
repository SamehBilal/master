<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware(['auth'])->name('dashboard');

/* Profile */
Route::get('profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile');
Route::post('profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile.edit');

/* Customers */
Route::resource('customers',\App\Http\Controllers\CustomerController::class);

/* Users */
Route::resource('users',\App\Http\Controllers\UserController::class);

/* Pickups */
Route::resource('pickups',\App\Http\Controllers\PickupController::class);

/* Orders */
Route::resource('orders',\App\Http\Controllers\OrderController::class);

require __DIR__.'/auth.php';
