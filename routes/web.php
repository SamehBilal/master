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
/* Language */
Route::get('lang/{locale}',[\App\Http\Controllers\ConfigController::class,'changelocal']); //language session

Route::get('/',[\App\Http\Controllers\WebsiteRoutesController::class,'index'])->name('website.index');

/* Route::get('/', function () {
    return view('coming-soon');
}); */

Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {
    /* Profile */
    Route::get('profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('profile');
    Route::post('profile/{id}',[\App\Http\Controllers\ProfileController::class,'update'])->name('profile.edit');

    Route::resource('customers',\App\Http\Controllers\ManageUsers\CustomerController::class); //Customers
    Route::resource('users',\App\Http\Controllers\UserController::class); //Users
    Route::resource('pickups',\App\Http\Controllers\PickupController::class); //Pickups
    Route::resource('orders',\App\Http\Controllers\OrderController::class); //Orders
    Route::get('orders/create/multi',[\App\Http\Controllers\OrderController::class,'multi'])->name('orders.create.multi'); //Multi Orders
    Route::get('orders/{order}/airwaybell',[\App\Http\Controllers\OrderController::class,'airwaybell'])->name('orders.create.airwaybell'); //Airway bell Orders
    Route::resource('tickets',\App\Http\Controllers\TicketController::class); //Tickets
    Route::resource('currencies',\App\Http\Controllers\CurrencyController::class); //Currencies
    Route::resource('user-categories',\App\Http\Controllers\UserCategoryController::class); //User Categories
    Route::resource('zones',\App\Http\Controllers\ZoneController::class); //Zone Categories
    Route::resource('locations',\App\Http\Controllers\LocationController::class); //Location
    Route::get('location-states',[\App\Http\Controllers\LocationController::class,'get_state'])->name('locations.states'); //Get States Ajax
    Route::get('location-cities',[\App\Http\Controllers\LocationController::class,'get_city'])->name('locations.cities'); //Get Cities Ajax
    Route::resource('contacts',\App\Http\Controllers\ContactController::class); //Contact
    Route::get('import',[\App\Http\Controllers\ExcelController::class,'import'])->name('import'); //import
    Route::get('export',[\App\Http\Controllers\ExcelController::class,'export'])->name('export'); //export


    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard' . '.'], function () {
        //
    });
    Route::group(['middleware' => ['role:Super Admin|admin']], function () {
        //
    });
});

require __DIR__.'/auth.php';
