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

// dashboard
Route::get('/weight_logs', [WeightController::class, 'show'])->name('dashboard');

// モーダル
Route::post('/weight_logs', [WeightController::class, 'storeWeight'])->name('weight.store');

// 検索
Route::get('/weight_logs/search', [WeightController::class, 'search'])->name('weight_logs.search');
Route::post('/weight_logs/search', [WeightController::class, 'search'])->name('weight_logs.search');

// 詳細
Route::get('/weight_logs/{weightLogId}', [WeightController::class, 'showDetail'])->name('detail');
Route::put('/weight_logs/{weightLogId}', [WeightController::class, 'update'])->name('weight.update');

//詳細　ページ遷移
Route::get('/weight_logs/{:weightLogId}', [WeightController::class, 'showDetail'])->name('detail');
Route::put('/weight_logs/{:weightLogId}', [WeightController::class, 'update'])->name('weight.update');
Route::delete('/weight_logs/{:weightLogId}', [WeightController::class, 'destroy'])->name('weight.destroy');
