<?php

use App\Http\Controllers\Admin\AddProjectController;
use App\Http\Controllers\Admin\AddImageController;
use App\Http\Controllers\Admin\DeleteImageController;
use App\Http\Controllers\Admin\DeleteProjectController;
use App\Http\Controllers\Admin\EditProjectController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('/kontakta-oss', [HomeController::class, 'contact'])->name('contact');
Route::get('/om-oss', [HomeController::class, 'about'])->name('about');

//Routes för att registrera. Namn är register
Route::get('/registrera', [RegisterController::class, 'index'])->name('register')->middleware('auth');
Route::post('/registrera', [RegisterController::class, 'store']);

//Routes för att logga in
Route::get('/logga_in', [LoginController::class, 'index'])->name('login');
Route::post('/logga_in', [LoginController::class, 'loginUser']);

//Route för att logga ut
Route::post('/logga_ut', [LogoutController::class, 'logout'])->name('logout');

//Route för att visa projektlista
Route::get('/projekt', [ProjectController::class, 'index'])->name('project');

//Route för att lägga till och ändra projekt
Route::get('/add_projekt', [AddProjectController::class, 'index'])->name('add_project')->middleware('auth');
Route::post('/add_projekt', [AddProjectController::class, 'storeProject'])->middleware('auth');
Route::get('/edit_projekt/{project}', [EditProjectController::class, 'index'])->name('edit_project_view')->middleware('auth');
Route::post('/edit_projekt', [EditProjectController::class, 'editProject'])->name('edit_project')->middleware('auth');
Route::get('/delete_projekt/{project}', [DeleteProjectController::class, 'index'])->name('delete_project_view')->middleware('auth');
Route::post('/delete_projekt', [DeleteProjectController::class, 'deleteProject'])->name('delete_project')->middleware('auth');

//Route för att hantera bilder
Route::get('/add_image', [AddImageController::class, 'index'])->name('add_image')->middleware('auth');
Route::post('/add_image', [AddImageController::class, 'storeImage'])->middleware('auth');
Route::get('delete_image/{project}', [DeleteImageController::class, 'index'])->name('delete_image_view')->middleware('auth');
Route::post('delete_image', [DeleteImageController::class, 'deleteImage'])->name('delete_image')->middleware('auth');

//Route för mail
Route::post('/kontakta-oss', [MailController::class, 'sendMail'])->name('send_mail');