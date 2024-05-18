<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//login
//Route::post('/login','App\Http\Controllers\Api\AuthController@login'); hasil dari chat GPT
Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);
//logout
Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout'])->middleware('auth:sanctum');
//company
//Route::get('/company/{id}', [App\Http\Controllers\Api\CompanyController::class, 'show']);
//bisa pakai seperti yg dibawah tapi di file CompanyController.php ganti public function show($id) menjadi public function show()
Route::get('/company', [App\Http\Controllers\Api\CompanyController::class, 'show'])->middleware('auth:sanctum');
//checkin
Route::post('/checkin',[App\Http\Controllers\Api\AttendanceController::class, 'checkin'])->middleware('auth:sanctum');
//checkout
Route::post('/checkout',[App\Http\Controllers\Api\AttendanceController::class, 'checkout'])->middleware('auth:sanctum');
//is Checkin
Route::get('/is-checkin',[App\Http\Controllers\Api\AttendanceController::class, 'isCheckedin'])->middleware('auth:sanctum');
//update profile
Route::post('/update-profile',[App\Http\Controllers\Api\AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
//Route::post('/update-profile', [App\Http\Controllers\Api\AuthController::class, 'updateProfile'])->middleware('auth:sanctum');
//update password
Route::apiResource('/api-permissions', App\Http\Controllers\Api\PermissionController::class)->middleware('auth:sanctum');
//atau bisa juga pakai
//Route::post('/permission',[App\Http\Controllers\Api\PermissionController::class, 'store'])->middleware('auth:sanctum');
//notes
Route::apiResource('/api-notes', App\Http\Controllers\Api\NoteController::class)->middleware('auth:sanctum');
