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

Route::get('/logout', function() {
    echo "get out of here!";
})->name('logout');

Route::resource('/users', 'App\Http\Controllers\UserController');

/**
 * 
 * 
 * ---------------------------------------
 * app routes
 * ---------------------------------------
 */


Route::middleware('auth')->group(function() {
    
    Route::get('dashboard', function() {
        return view('app.dashboard');
    })->name('dashboard');
});