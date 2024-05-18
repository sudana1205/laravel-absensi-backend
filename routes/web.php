<?php

use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\UserController;
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

    Route::resource('users', UserController::class);
    Route::resource('companies', CompanyController::class);
    Route::resource('attendances', AttendanceController::class);
    Route::resource('permissions', PermissionController::class);

});

// Route::get('/login', function () {
//     return view('pages.auth.auth-login');
// });

