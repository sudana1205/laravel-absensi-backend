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
