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
});

Route::get('/auth', ['App\Http\Controllers\Auth\LoginController', 'authenticate']);

Route::get('/login', ['App\Http\Controllers\Auth\LoginController', 'index']);

Route::get('/logout', function() {
    echo "get out of here!";
});

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



Route::get('/', function () {
    echo "home page!";
});

Route::get('dashboard', function() {
    echo "this is the dashboard!";
});

