<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EvenementController;

Route::get('/', [EvenementController::class, 'index'])
    ->name('evenements.index');

Route::get('/evenements/create', [EvenementController::class, 'create'])
    ->name('evenements.create');

Route::post('/evenements', [EvenementController::class, 'store'])
    ->name('evenements.store');