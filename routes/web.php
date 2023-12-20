<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\FypGroupController;
use App\Http\Controllers\EvaluatorController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [LoginController::class, 'processLogin'])->name('login.process');


Route::get('/admin/home', [AdminUserController::class, 'showHomePg'])->name('admin.home');

Route::get('/evaluator/home', [EvaluatorController::class, 'showHomePg'])->name('evaluator.home');

Route::get('/fyp_group/home', [FypGroupController::class, 'showHomePg'])->name('fyp_group.home');

Route::post('/update-rating', [EvaluatorController::class, 'updateRating'])->name('update.rating');

Route::post('/edit/details', [FYPGroupController::class, 'editDetails'])->name('edit.details');
Route::post('/edit/keywords', [FYPGroupController::class, 'editKeywords'])->name('edit.keywords');