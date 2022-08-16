<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\PessoaController;
use App\Http\Middleware\Autenticador;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Middleware\Authenticate;
use App\Models\Turma;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;


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
Route::middleware(Autenticador::class)->group(function (){






Route::controller(PessoaController::class)->group(function () {

    Route::get('/aluno', 'indexAluno')->name('aluno.index')->middleware(Autenticador::class);
    Route::get('/professor', 'indexProfessor')->name('professor.index')->middleware(Autenticador::class);
    Route::get('/aluno/create', 'createAluno')->name('aluno.create');
    Route::get('/professor/create', 'createProfessor')->name('professor.create');
    Route::post('/aluno/create', 'store')->name('aluno.store');
    Route::post('/professor/create', 'store')->name('professor.store');
    Route::delete('/aluno/{id}', 'destroyAluno' )->name('aluno.destroy');
    Route::delete('/professor/{id}', 'destroyProfessor' )->name('professor.destroy');
    Route::get('/pessoa/editaluno/{pessoaID}' , 'editAluno')->name('aluno.edit');
    Route::get('/pessoa/editprofessor/{pessoaID}' , 'editProfessor')->name('professor.edit');
    Route::put('/aluno/{id}' , 'updateAluno')->name('aluno.update');
    Route::put('/professor/{id}' , 'updateProfessor')->name('professor.update');
});




Route::get('/home', [HomeController::class, 'index'])->name('home.index');
Route::put('/home/email/{id}', [HomeController::class, 'email'])->name('home.email');


Route::get('turma', [TurmaController::class, 'index'])->name('turma.index');

Route::get('turma/create', [TurmaController::class, 'create'])->name('turma.create');

Route::post('turma/create', [TurmaController::class, 'store'])->name('turma.store');

Route::delete('turma/{id}',[TurmaController::class, 'destroy'] )->name('turma.destroy');

});

Route::get('/login', [LoginController::class, 'index'])->name('login');



Route::post('/login', [LoginController::class, 'store'])->name('signin');

Route::get('/logout', [LoginController::class, 'destroy'])->name('logout');


Route::get('/registro', [UsuarioController::class, 'create'])->name('usuario.create');


Route::post('/registro', [UsuarioController::class, 'store'])->name('usuario.store');


Route::get('/email', function(){
    return new \App\Mail\EnvioEmail(
        'pedro',
        'removida'
    );
}
);

Route::get('/email/send', function(){
    $email = new \App\Mail\EnvioEmail(
        'pedro',
        'removida'
    );
    $user=(object)[
        'email' =>'g1l14rd3@gmail.com',
        'name' =>'giga'
    ];

    Mail::to($user)->send($email);

    return 'Email enviado';
});
