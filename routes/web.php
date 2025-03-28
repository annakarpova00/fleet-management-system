<?php

use App\Http\Controllers\FleetController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
Route::get('/fleets', [FleetController::class, 'index'])->name('fleets.index');
Route::get('/fleets/{fleet}', [FleetController::class, 'show'])->name('fleets.show');
