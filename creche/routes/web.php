<?php

use App\Http\Controllers\AlunoController;
use Illuminate\Support\Facades\Route;
use app\Models\Creche;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/aluno', [AlunoController::class , 'index'])->name('listar_crianca');

Route::get('/aluno/create', [AlunoController::class , 'create']);

Route::post('aluno/create', [AlunoController::class , 'store']);

Route::delete('aluno/{id}', [AlunoController::class, 'destroy']);

Route::get('aluno/edit/{id}' , [AlunoController::class, 'edit']);

Route::post('aluno/edit/{id}' , [AlunoController::class, 'editar']);
