<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\BetController;

Route::get('/', function () {
    return view('dashboard');
});

// EA Bets CRUD routes
Route::resource('teams', TeamController::class);
Route::resource('players', PlayerController::class);
Route::resource('bets', BetController::class);
