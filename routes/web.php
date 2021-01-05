<?php

use App\Http\Controllers\Admin\AddProjektController;
use App\Http\Controllers\Admin\AddImageController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjektController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');

//Routes för att registrera. Namn är register
Route::get('/registrera', [RegisterController::class, 'index'])->name('register');
Route::post('/registrera', [RegisterController::class, 'store']);

//Routes för att logga in
Route::get('/logga_in', [LoginController::class, 'index'])->name('login');
Route::post('/logga_in', [LoginController::class, 'loginUser']);

//Route för att logga ut
Route::post('/logga_ut', [LogoutController::class, 'logout'])->name('logout');

//Route för att visa projektlista
Route::get('/projekt', [ProjektController::class, 'index'])->name('project');

//Route för att lägga till och ändra projekt
Route::get('/add_projekt', [AddProjektController::class, 'index'])->name('add_project');
Route::post('/add_projekt', [AddProjektController::class, 'storeProject']);

//Route för att hantera bilder
Route::get('/add_image', [AddImageController::class, 'index'])->name('add_image');
Route::post('/add_image', [AddImageController::class, 'storeImage']);

Route::get('/test', [TestController::class, 'index']);