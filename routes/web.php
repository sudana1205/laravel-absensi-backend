<?php

use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('pages.auth.auth-login');
});
// Route::get('/dashboard', function () {
//     return view('pages.dashboard',['type_menu'=>'']);
// });

Route::middleware(['auth'])->group(function(){
    Route::get('home',function(){
        return view('pages.dashboard',['type_menu' => 'home']);
    })->name('home');
});

// Route::get('/login', function () {
//     return view('pages.auth.auth-login');
// });

