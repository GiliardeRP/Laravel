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


Route::controller(AlunoController::class)->group(function () {

    Route::get('/aluno',  'index')->name('aluno.index');

    Route::get('/aluno/create', 'create')->name('aluno.create');

    Route::post('aluno/create', 'store')->name('aluno.store');

    Route::delete('aluno/{id}', 'destroy' )->name('aluno.destroy');

    Route::get('aluno/edit/{alunoID}' ,  'edit')->name('aluno.edit');

    Route::put('aluno/{id}' , 'update')->name('aluno.update');

});

