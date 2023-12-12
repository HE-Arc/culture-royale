<?php

use App\Http\Controllers\QuestionController;
use App\Http\Controllers\HomeController;
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

Route::resource('questions', QuestionController::class);

Route::post('lobbies/join', [LobbyController::class, 'join'])->name('lobbies.join');
Route::post('lobbies/store', [LobbyController::class, 'store'])->name('lobbies.store');;
Route::get('lobbies/{id}/join', [PlayerController::class, 'create'])->name('players.create');
Route::get('lobbies/{id}/waiting', [LobbyController::class, 'waiting'])->name('lobbies.waiting');
