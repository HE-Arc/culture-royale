<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ModifQController;
use App\Http\Controllers\ScoreController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\LobbyController;
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
Route::get('/quiz', [QuizController::class, 'index'])->name('quiz.index');
Route::get('/quiz/start', [QuizController::class, 'start'])->name('quiz.start');
Route::get('/quiz/end', [QuizController::class, 'end'])->name('quiz.end');
Route::post('/quiz/submit', [QuizController::class, 'submitAnswer'])->name('quiz.submit');



Route::resource('questions', QuestionController::class);
Route::get('/scores', [ScoreController::class, 'index'])->name("scores.index");
Route::post('/scores/store', [ScoreController::class, 'store'])->name("scores.store");
Route::post('lobbies/join', [LobbyController::class, 'join'])->name('lobbies.join');
Route::post('lobbies/store', [LobbyController::class, 'store'])->name('lobbies.store');;
Route::get('lobbies/{id}/join', [PlayerController::class, 'create'])->name('players.create');
Route::get('lobbies/{id}/waiting', [LobbyController::class, 'waiting'])->name('lobbies.waiting');