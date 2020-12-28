<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

//Routes för att registrera. Namn är register
Route::get('/registrera', [RegisterController::class, 'index'])->name('register');
Route::post('/registrera', [RegisterController::class, 'store']);

//Routes för att logga in
Route::get('/logga_in', [LoginController::class, 'index'])->name('login');
Route::post('/logga_in', [LoginController::class, 'loginUser']);