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
Route::get('/about-us',[\App\Http\Controllers\WebsiteRoutesController::class,'about'])->name('website.about-us');
Route::get('/contact-us',[\App\Http\Controllers\WebsiteRoutesController::class,'contact'])->name('website.contact-us');
Route::get('/pricing',[\App\Http\Controllers\WebsiteRoutesController::class,'pricing'])->name('website.pricing');
Route::get('/locations',[\App\Http\Controllers\WebsiteRoutesController::class,'locations'])->name('website.locations');
Route::get('/help',[\App\Http\Controllers\WebsiteRoutesController::class,'help'])->name('website.help');
Route::get('/terms-and-conditions',[\App\Http\Controllers\WebsiteRoutesController::class,'terms'])->name('website.terms');
Route::get('/track-shipment',[\App\Http\Controllers\WebsiteRoutesController::class,'track'])->name('website.track');
Route::get('/calculate-shipment',[\App\Http\Controllers\WebsiteRoutesController::class,'calculate_shipment'])->name('website.calculation');
Route::resource('contact-forms', \App\Http\Controllers\ContactFormController::class)->only(['create', 'store']);//Contact Forms
Route::resource('subscribers', \App\Http\Controllers\SubscribeController::class)->only(['create', 'store']);//Subscribes
Route::get('/my-account',[\App\Http\Controllers\WebsiteRoutesController::class,'account'])->name('website.account');

/* Route::get('/', function () {
    return view('coming-soon');
}); */

Route::get('/dashboard', function () {
    return view('dashboard.admin');
})->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard' . '.'], function () {
        /* Profile */
        Route::get('settings/profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('settings.profile');
        Route::post('settings/profile/{id}',[\App\Http\Controllers\ProfileController::class,'update'])->name('settings.profile.edit');

        Route::resource('customers',\App\Http\Controllers\ManageUsers\CustomerController::class); //Customers
        Route::resource('users',\App\Http\Controllers\UserController::class); //Users
        Route::resource('pickups',\App\Http\Controllers\PickupController::class); //Pickups
        Route::resource('orders',\App\Http\Controllers\OrderController::class); //Orders
        Route::get('orders/create/multi',[\App\Http\Controllers\OrderController::class,'multi'])->name('orders.create.multi'); //Multi Orders
        Route::get('orders/{order}/airwaybell',[\App\Http\Controllers\OrderController::class,'airwaybell'])->name('orders.create.airwaybell'); //Airway bell Orders
        Route::post('ticketchat/{ticket_id}',[\App\Http\Controllers\TicketController::class,'sendTicketMessage'])->name('tickets.sendmessage'); //send ticket message
        Route::resource('tickets',\App\Http\Controllers\TicketController::class); //Tickets
        Route::resource('currencies',\App\Http\Controllers\CurrencyController::class); //Currencies
        Route::resource('user-categories',\App\Http\Controllers\UserCategoryController::class); //User Categories
        Route::resource('zones',\App\Http\Controllers\ZoneController::class); //Zone Categories
        Route::resource('locations',\App\Http\Controllers\LocationController::class); //Location
        Route::resource('contact-forms',\App\Http\Controllers\ContactFormController::class)->except(['create', 'store',]);; //Contact Forms
        Route::resource('subscribers',\App\Http\Controllers\SubscribeController::class)->except(['create', 'store',]);; //Subscribes
        Route::get('location-states',[\App\Http\Controllers\LocationController::class,'get_state'])->name('locations.states'); //Get States Ajax
        Route::get('location-cities',[\App\Http\Controllers\LocationController::class,'get_city'])->name('locations.cities'); //Get Cities Ajax
        Route::resource('contacts',\App\Http\Controllers\ManageUsers\ContactController::class); //Contact
        Route::get('import',[\App\Http\Controllers\ExcelController::class,'import'])->name('import'); //import
        Route::get('export',[\App\Http\Controllers\ExcelController::class,'export'])->name('export'); //export
        Route::get('settings',[\App\Http\Controllers\SettingsController::class,'index'])->name('settings'); //settings
    });

    Route::group(['middleware' => ['role:Super Admin|admin']], function () {
        //
    });
});

require __DIR__.'/auth.php';
