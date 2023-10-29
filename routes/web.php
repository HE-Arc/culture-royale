<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModifQController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/questions/{id}/edit', [ModifQController::class, 'edit'])->name('questions.edit');
Route::put('/questions/{id}', [ModifQController::class, 'update'])->name('questions.update');



Route::resource('questions', QuestionController::class);
