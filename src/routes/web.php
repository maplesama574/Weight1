<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightController;
use Laravel\Fortify\Fortify;

Route::get('/', function () {
    return view('welcome');
});

// Register 
Route::get('/register/step1', [WeightController::class, 'showStep1'])->name('register1');
Route::post('/register/step1', [WeightController::class, 'storeStep1'])->name('register1.store');
Route::get('/register/step2', [WeightController::class, 'showStep2'])->name('register2');
Route::post('/register/step2', [WeightController::class, 'storeStep2'])->name('register2.store');

// Login
Route::get('/login', [WeightController::class, 'index'])->name('login');

//dashboard
Route::get('/weight_logs', [WeightController::class, 'show'])->name('dashboard');
Route::post('/weight_logs', [WeightController::class, 'storeWeight'])->name('');

//calender
Route::get('/weight_logs/search', [WeightController::class, 'search'])->name('weight_logs.search');

//mordal
Route::post('/weight_logs', [WeightController::class, 'storeWeight'])->name('weight.store');

//detail
Route::get('/weight_logs/{:weightLogId}', [WeightController::class, 'showDetail'])->name('detail');
Route::put('/weight_logs/{:weightLogId}',  [WeightController::class, 'update'])->name('detail');

//search
Route::post('/weight_logs/search', [WeightController::class, 'search'])->name('weight_logs.search');