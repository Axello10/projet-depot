<?php

use Illuminate\Support\Facades\Route;

/**
 * 
 * -----------------------------
 * Auth routes!  
 * -----------------------------
 */


// Route::get('/register', function() { echo "registered"; })->name('register');

Route::get('/auth', ['App\Http\Controllers\Auth\LoginController', 'authenticate'])->name('auth');

Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'index'])->name('login');

Route::get('/logout', ['App\Http\Controllers\Auth\LogoutController', 'logout'])->name('logout');


/**
 * 
 * 
 * ---------------------------------------
 * app routes
 * ---------------------------------------
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

    Route::resource('vendors', 'App\Http\Controllers\App\VendorController');

    Route::resource('products', 'App\Http\Controllers\App\ProductController');

    Route::resource('grades', 'App\Http\Controllers\App\GradeController');

    Route::resource('clients', 'App\Http\Controllers\App\ClientController');

    Route::resource('deposits', 'App\Http\Controllers\App\DepositController');
});