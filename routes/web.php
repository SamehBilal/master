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

Route::resource('customers',\App\Http\Controllers\CustomerController::class);
Route::resource('users',\App\Http\Controllers\UserController::class);
Route::resource('pickups',\App\Http\Controllers\PickupController::class);

require __DIR__.'/auth.php';
