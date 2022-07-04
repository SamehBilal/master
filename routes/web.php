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
Route::get('/privacy-policy',[\App\Http\Controllers\WebsiteRoutesController::class,'privacy'])->name('website.privacy');
Route::get('/track-shipment/{order}',[\App\Http\Controllers\WebsiteRoutesController::class,'track'])->name('website.track');
Route::get('/search',[\App\Http\Controllers\WebsiteRoutesController::class,'search'])->name('website.search');
Route::get('/calculate-shipment',[\App\Http\Controllers\WebsiteRoutesController::class,'calculate_shipment'])->name('website.calculation');
Route::resource('contact-forms', \App\Http\Controllers\ContactFormController::class)->only(['create', 'store']);//Contact Forms
Route::resource('subscribers', \App\Http\Controllers\SubscribeController::class)->only(['create', 'store']);//Subscribes
Route::get('/my-account',[\App\Http\Controllers\WebsiteRoutesController::class,'account'])->name('website.account');
Route::post('my-account/{id}',[\App\Http\Controllers\WebsiteRoutesController::class,'update'])->name('website.account.edit');


/* Notifications */
Route::get('/notification',[\App\Http\Controllers\NotificationsController::class,'markasreadajax']);

/* Route::get('/', function () {
    return view('coming-soon');
}); */

Route::get('/dashboard',\App\Http\Controllers\DashboardController::class)->middleware(['auth'])->name('dashboard');

Route::group(['middleware' => ['auth']], function () {

    Route::group(['prefix' => 'dashboard', 'as' => 'dashboard' . '.'], function () {
        //Route::group(['middleware' => ['role:Super Admin|admin']], function () {
            /* Profile */
            Route::get('settings/profile',[\App\Http\Controllers\ProfileController::class,'index'])->name('settings.profile');
            Route::post('settings/profile/{id}',[\App\Http\Controllers\ProfileController::class,'update'])->name('settings.profile.edit');
            Route::get('settings/language',[\App\Http\Controllers\ConfigController::class,'index'])->name('settings.language');
            Route::get('settings/business',[\App\Http\Controllers\BusinessController::class,'settings'])->name('settings.business');

            Route::resource('customers',\App\Http\Controllers\ManageUsers\CustomerController::class); //Customers
            Route::resource('users',\App\Http\Controllers\UserController::class); //Users
            Route::resource('pickups',\App\Http\Controllers\PickupController::class); //Pickups
            Route::resource('orders',\App\Http\Controllers\OrderController::class); //Orders
            Route::resource('orders/{order}/order-logs',\App\Http\Controllers\OrderLogController::class); //Order logs
            Route::resource('orders/{order}/order-customer-logs',\App\Http\Controllers\customerlogController::class); //Order logs
            Route::resource('pickups/{pickup}/pickup-logs',\App\Http\Controllers\PickupLogController::class); //Pickup logs
            Route::get('orders/create/multi',[\App\Http\Controllers\OrderMultiController::class,'index'])->name('orders.create.multi'); //Multi Orders
            Route::post('orders/create/multi',[\App\Http\Controllers\OrderMultiController::class,'store'])->name('orders.create.multi.store'); //Multi Orders
            Route::get('orders/{order}/courier/',[\App\Http\Controllers\CourierLogsController::class,'create_order'])->name('orders.courier'); //Courier
            Route::post('orders/{order}/courier',[\App\Http\Controllers\CourierLogsController::class,'store_order'])->name('orders.create.courier'); //Multi Orders
            Route::get('pickups/{pickup}/courier/',[\App\Http\Controllers\CourierLogsController::class,'create_pickup'])->name('pickups.courier'); //Courier
            Route::post('pickups/{pickup}/courier',[\App\Http\Controllers\CourierLogsController::class,'store_pickup'])->name('pickups.create.courier'); //Multi Orders
            Route::get('orders/{order}/courier/{log}/edit',[\App\Http\Controllers\CourierLogsController::class,'edit_order'])->name('orders.courier.edit'); //Courier
            Route::put('orders/{order}/courier/{log}/edit',[\App\Http\Controllers\CourierLogsController::class,'update_order'])->name('orders.update.courier'); //Multi Orders
            Route::get('pickups/{pickup}/courier/{log}/edit',[\App\Http\Controllers\CourierLogsController::class,'edit_pickup'])->name('pickups.courier.edit'); //Courier
            Route::put('pickups/{pickup}/courier/{log}/edit',[\App\Http\Controllers\CourierLogsController::class,'update_pickup'])->name('pickups.update.courier'); //Multi Orders
            Route::delete('orders/{order}/courier/{log}/delete',[\App\Http\Controllers\CourierLogsController::class,'delete_order'])->name('orders.delete.courier'); //Multi Orders
            Route::delete('pickups/{pickup}/courier/{log}/delete',[\App\Http\Controllers\CourierLogsController::class,'delete_pickup'])->name('pickups.delete.courier'); //Multi Orders
            Route::get('orders/{order}/qr',[\App\Http\Controllers\OrderController::class,'qr'])->name('orders.create.qr'); //Qr
            Route::get('pickups/{pickup}/qr',[\App\Http\Controllers\PickupController::class,'qr'])->name('pickups.create.qr'); //Qr
            Route::get('orders/{order}/airwaybell',[\App\Http\Controllers\OrderController::class,'airwaybell'])->name('orders.create.airwaybell'); //Airway bell Orders
            Route::post('ticketchat/{ticket_id}',[\App\Http\Controllers\TicketController::class,'sendTicketMessage'])->name('tickets.sendmessage'); //send ticket message
            Route::resource('tickets',\App\Http\Controllers\TicketController::class); //Tickets
            Route::resource('currencies',\App\Http\Controllers\CurrencyController::class); //Currencies
            Route::resource('user-categories',\App\Http\Controllers\UserCategoryController::class); //User Categories
            Route::resource('zones',\App\Http\Controllers\ZoneController::class); //Zone Categories
            Route::resource('locations',\App\Http\Controllers\LocationController::class); //Location
            Route::resource('mission',\App\Http\Controllers\AboutController::class); //Mission
            Route::resource('deals',\App\Http\Controllers\DealController::class); //Deal
            Route::resource('contact-forms',\App\Http\Controllers\ContactFormController::class)->except(['create', 'store',]); //Contact Forms
            Route::resource('subscribers',\App\Http\Controllers\SubscribeController::class)->except(['create', 'store',]); //Subscribes
            Route::resource('businesses',\App\Http\Controllers\BusinessController::class); //Business
            Route::resource('hubs',\App\Http\Controllers\HubController::class); //Hub
            Route::get('business',[\App\Http\Controllers\BusinessController::class,'create_front'])->name('business.create_front'); //Business
            Route::get('location-states',[\App\Http\Controllers\LocationController::class,'get_state'])->name('locations.states'); //Get States Ajax
            Route::get('location-cities',[\App\Http\Controllers\LocationController::class,'get_city'])->name('locations.cities'); //Get Cities Ajax
            Route::resource('contacts',\App\Http\Controllers\ManageUsers\ContactController::class); //Contact
            Route::get('import',[\App\Http\Controllers\ExcelController::class,'import'])->name('import'); //import
            Route::get('export',[\App\Http\Controllers\ExcelController::class,'export'])->name('export'); //export
            Route::get('settings',[\App\Http\Controllers\SettingsController::class,'index'])->name('settings'); //settings
            Route::resource('permissions',\App\Http\Controllers\PermissionController::class)->except(['show']); //permissions
            Route::resource('roles',\App\Http\Controllers\RoleController::class)->except(['show']); //roles
            Route::resource('problems',\App\Http\Controllers\ProblemsController::class); //problems

        //});
    });


        //

});

require __DIR__.'/auth.php';
