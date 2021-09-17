<?php

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
        return view('app.dashboard');
    })->name('dashboard');

    Route::get('dashboard', function() {
        return view('app.dashboard');
    })->name('dashboard');

    Route::resource('users', 'App\Http\Controllers\App\UserController');

    Route::resource('entries', 'App\Http\Controllers\App\EntryController');

    Route::resource('sorties', 'App\Http\Controllers\App\SortieController');

    Route::resource('vendors', 'App\Http\Controllers\App\VendorController');

    Route::resource('products', 'App\Http\Controllers\App\ProductController');

    Route::resource('grades', 'App\Http\Controllers\App\GradeController');

    Route::resource('clients', 'App\Http\Controllers\App\ClientController');

    Route::resource('deposits', 'App\Http\Controllers\App\DepositController');

    Route::resource('empties', 'App\Http\Controllers\App\EmptieController');

    Route::resource('givebacks', 'App\Http\Controllers\App\GivebackController');


    /**
     * 
     * ===========================
     * more routes!
     * ===========================
     * 
     */

    Route::get('dashboard/products', 'App\Http\Controllers\AppController@products')->name('products');

    Route::get('dashboard/entries', 'App\Http\Controllers\AppController@entries')->name('entries');

    Route::get('dashboard/allproduct', 'App\Http\Controllers\AppController@allproduct')->name('allproduct');

    Route::get('exits', 'App\Http\Controllers\AppController@exits')->name('exits');
});

