<?php

use App\Http\Controllers\{HomeController, PessoaController, LoginController, TurmaController, UsuarioController};

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Autenticador;

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

Route::middleware(Autenticador::class)->group(function () {

    Route::controller(PessoaController::class)->group(function () {

        Route::get('/aluno', 'indexAluno')->name('aluno.index')->middleware(Autenticador::class);
        Route::get('/professor', 'indexProfessor')->name('professor.index')->middleware(Autenticador::class);
        Route::get('/aluno/create', 'createAluno')->name('aluno.create');
        Route::get('/professor/create', 'createProfessor')->name('professor.create');
        Route::post('/aluno/create', 'store')->name('aluno.store');
        Route::post('/professor/create', 'store')->name('professor.store');
        Route::delete('/aluno/{id}', 'destroyAluno')->name('aluno.destroy');
        Route::delete('/professor/{id}', 'destroyProfessor')->name('professor.destroy');
        Route::get('/pessoa/editaluno/{pessoaID}', 'editAluno')->name('aluno.edit');
        Route::get('/pessoa/editprofessor/{pessoaID}', 'editProfessor')->name('professor.edit');
        Route::put('/aluno/{id}', 'updateAluno')->name('aluno.update');
        Route::put('/professor/{id}', 'updateProfessor')->name('professor.update');
    });

    Route::controller(TurmaController::class)->group(function () {

        Route::get('turma', 'index')->name('turma.index');
        Route::get('turma/create', 'create')->name('turma.create');
        Route::post('turma/create', 'store')->name('turma.store');
        Route::get('turma/edit/{id}', 'edit')->name('turma.edit');
        Route::put('turma/edit/{id}', 'update')->name('turma.update');
        Route::delete('turma/{id}', 'destroy')->name('turma.destroy');
        Route::get('/turma/list/{id}', 'list')->name('listar.turma');
    });

    Route::get('/home', [HomeController::class, 'index'])->name('home.index');
    Route::put('/home/email/{id}', [HomeController::class, 'email'])->name('home.email');
});

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store'])->name('signin');
Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');

Route::get('/registro', [UsuarioController::class, 'create'])->name('usuario.create');
Route::post('/registro', [UsuarioController::class, 'store'])->name('usuario.store');
