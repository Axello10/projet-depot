<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    echo "home page!";
});

/**
 * 
 * -----------------------------
 * Auth routes!  
 * -----------------------------
 */

Route::get('/register', function() {
    echo "register here!";
});

Route::get('/login', function() {
    return view('Auth.login');
});

Route::get('/logout', function() {
    echo "get out of here!";
});

/*
Route::get('/forget-password', function() {
    echo "register here!";
});
*/