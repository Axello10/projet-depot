<?php

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Route;


/**
 * 
 * 
 * -----------------------------------------------
 * auth routes
 * -----------------------------------------------
 * 
 */

Route::get('/auth', ['App\Http\Controllers\Auth\LoginController', 'authenticate'])->name('auth');

Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'index'])->name('login');

Route::get('/logout', ['App\Http\Controllers\Auth\LogoutController', 'logout'])->name('logout');


/**
 * 
 * 
 * ---------------------------------------
 * app routes
 * ---------------------------------------
 * 
 */


Route::middleware('auth')->group(function() {

    Route::get('/', function() {
        return redirect()->route('dashboard');
    });
    
    Route::get('dashboard', 'App\Http\Controllers\AppController@dashboard')->name('dashboard');

    Route::resource('users', 'App\Http\Controllers\App\UserController');

    Route::resource('entries', 'App\Http\Controllers\App\EntryController');

    Route::resource('sorties', 'App\Http\Controllers\App\SortieController');

    Route::resource('vendors', 'App\Http\Controllers\App\VendorController');

    Route::resource('products', 'App\Http\Controllers\App\ProductController');

    Route::resource('clients', 'App\Http\Controllers\App\ClientController');

    Route::resource('deposits', 'App\Http\Controllers\App\DepositController');

    Route::resource('empties', 'App\Http\Controllers\App\EmptieController');

    Route::resource('givebacks', 'App\Http\Controllers\App\GivebackController');

    Route::resource('depotproducts', 'App\Http\Controllers\App\DepositProductController');

    Route::resource('simplexits', 'App\Http\Controllers\App\SimpleExitController');

    Route::resource('employes', 'App\Http\Controllers\App\EmployeController');

    Route::resource('rarecases', 'App\Http\Controllers\App\RareCaseController');

    Route::resource('sdeposits', 'App\Http\Controllers\App\SortiedepotController');

    Route::resource('estocks', 'App\Http\Controllers\App\EstockController');

    /**
     * 
     * ===========================
     * more routes!
     * ===========================
     * 
     */

    /// page pour la liste des produits vendue
     Route::get('dashboard/products', 'App\Http\Controllers\AppController@products')->name('products');
    
    /// page pour les entrees
    Route::get('dashboard/entries', 'App\Http\Controllers\AppController@entries')->name('entries');
    
    /// page pour les sortie
    Route::get('dashboard/exits', 'App\Http\Controllers\AppController@exits')->name('exits');
    
    /// page pour les produits correspondant au depot au quel un utilisateur est associé
    Route::get('dashboard/allproduct', 'App\Http\Controllers\AppController@allproduct')->name('allproduct');
    
    /// page pour la liste des depots et designant chaqun les produits dispo 
    Route::get('dashboard/deposit', 'App\Http\Controllers\AppController@depotproduct')->name('depotproduct');

    /// page pour les vides correspondant au depot au quel un utilisateur est associé
    Route::get('dashboard/emptie', 'App\Http\Controllers\AppController@emptie');
});





/**
 * 
 * test route
 */


// checking if 24h passed between a date and another


// Route::get('test', function() {
//     $today = Carbon::now();
//     $date_of_creation = Carbon::instance(User::findOrFail(2)->created_at);
//     // $date_of_creation = new Carbon(User::findOrFail(1)->created_at);
//     // $date2 = Carbon::createFromFormat('m/d/Y H:i:s', '09/09/2020 20:41:00');
//     // format ->format('d/m/Y H:i:s');

//     return $today->gt($date_of_creation);
//     // var_dump($result);
//     // return ['today' => $today, 'creation' => $date_of_creation];
// });