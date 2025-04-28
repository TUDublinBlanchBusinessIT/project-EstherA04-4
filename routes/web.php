<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;
use App\Http\Controllers\BetController;

// Default route
Route::get('/', function () {
    return redirect()->route('teams.index');
});

// Routes for Teams
Route::resource('teams', TeamController::class)->except(['show']);

// Routes for Players
Route::resource('players', PlayerController::class)->except(['show']);

// Routes for Bets (add these routes for managing bets)
Route::resource('bets', BetController::class);
