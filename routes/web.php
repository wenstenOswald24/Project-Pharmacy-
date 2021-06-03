<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\AdminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/medicines', [MedicineController::class, 'getMedicine']);
Route::post('/medicines/{user_type}', [MedicineController::class, 'createMedicine']);
Route::delete('/medicines/{user_type}/{id}', [MedicineController::class, 'deleteMedicine']);
Route::post('/medicines/{user_type}/{id}', [MedicineController::class, 'editMedicine']);

Route::get('/customer', [CustomerController::class, 'getCustomer']);
Route::post('/customer/{user_type}', [CustomerController::class, 'createCustomer']);
Route::delete('/customer/{user_type}/{id}', [CustomerController::class, 'deleteCustomer']);
Route::post('/customer/{user_type}/{id}', [CustomerController::class, 'editCustomer']);

Route::post('/register', [AdminController::class, 'register']);
Route::post('/userlogin', [AdminController::class, 'login']);

