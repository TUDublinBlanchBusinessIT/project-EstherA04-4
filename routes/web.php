<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\PlayerController;

/*
|----------------------------------------------------------------------
| Web Routes
|----------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Default route
Route::get('/', function () {
    return redirect()->route('teams.index');  // Redirect to teams index page
});

// Routes for Teams (using TeamController)
Route::resource('teams', TeamController::class)->except(['show']);

// Routes for Players (using PlayerController)
Route::resource('players', PlayerController::class)->except(['show']);
