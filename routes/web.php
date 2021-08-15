<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
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
    echo "login here!";
});

Route::get('/logout', function() {
    echo "get out of here!";
});

/*
Route::get('/forget-password', function() {
    echo "register here!";
});
*/