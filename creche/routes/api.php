<?php

use App\Http\Controllers\PessoaController;
use App\Http\Controllers\TurmaController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('json/aluno', [PessoaController::class, 'retornoJsonAluno'])->name('json.aluno');
Route::get('json/professor', [PessoaController::class, 'retornoJsonProfessor'])->name('json.professor');
Route::get('json/turma', [TurmaController::class, 'retornoJsonTurma'])->name('json.turma');
