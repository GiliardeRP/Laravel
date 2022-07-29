<?php

use App\Http\Controllers\SeriesController;
use Illuminate\Support\Facades\Route;




Route::get('/series', [SeriesController::class, 'index'])
    ->name('listar_series');

Route::get('/series/create',[SeriesController::class, 'create'])
    ->name('form_criar_serie');

Route::post('/series/create', [SeriesController::class, 'store']);

Route::delete('/series/{id}', [SeriesController::class, 'destroy']);
