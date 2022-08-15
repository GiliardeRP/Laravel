<?php

use App\Http\Controllers\PessoaController;
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

Route::controller(PessoaController::class)->group(function () {

    Route::get('/pessoa',  'index')->name('pessoa.index');

    Route::get('/pessoa/create', 'create')->name('pessoa.create');

    Route::post('pessoa/create', 'store')->name('pessoa.store');

    Route::delete('pessoa/{id}', 'destroy' )->name('pessoa.destroy');

    Route::get('pessoa/edit/{pessoaID}' ,  'edit')->name('pessoa.edit');

    Route::put('pessoa/{id}' , 'update')->name('pessoa.update');

});

