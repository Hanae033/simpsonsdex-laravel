<?php

use App\Http\Controllers\PersonajeController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('personajes.create'));

Route::get('/personajes/create', [PersonajeController::class, 'create'])
     ->name('personajes.create');

Route::post('/personajes', [PersonajeController::class, 'store'])
     ->name('personajes.store');