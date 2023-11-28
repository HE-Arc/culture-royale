<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
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
Route::get('/quiz', [QuizController::class, 'index'])->name('Quiz');
Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])->name('quiz.submit');



Route::resource('questions', QuestionController::class);
