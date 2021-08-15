<?php

use Illuminate\Support\Facades\Route;

/**
 * 
 * -----------------------------
 * Auth routes!  
 * -----------------------------
 */

Route::get('/register', function() {
    echo "register here!";
})->name('register');

Route::get('/auth', ['App\Http\Controllers\Auth\LoginController', 'authenticate'])->name('auth');

Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'index'])->name('login');

Route::get('/logout', function() {
    echo "get out of here!";
})->name('logout');

/*
Route::get('/forget-password', function() {
    echo "register here!";
});
*/


/**
 * 
 * 
 * ---------------------------------------
 * app routes
 * ---------------------------------------
 */


Route::middleware('auth')->group(function() {
    
    Route::get('dashboard', function() {
        echo "this is the dashboard!";
    })->name('dashboard');
});