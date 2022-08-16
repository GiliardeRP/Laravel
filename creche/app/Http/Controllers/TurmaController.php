<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\{Turma, Pessoa, User};
use App\Service\EnviaEmail;
use Illuminate\Http\Request;

class TurmaController extends Controller
{
    public function index(Request $request)
    {
        $turma = Turma::query()->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('turma.index')->with('turmas', $turma)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create(){
        $aluno = Pessoa::all()->where('tipo', 'aluno');
        $professor = Pessoa::all()->where('tipo', 'professor');

        return view('turma.create')->with('alunos', $aluno)->with('professores', $professor);
    }

    public function store(Turma $turma, Pessoa $pessoa, Request $request, EnviaEmail $enviaEmail){

        $ids = $request->pessoa_id[0];

            $turma = Turma::create([
                'identificador' => $request->identificadorTurma,
                'materia' => $request->materiaTurma,
                'periodo' => $request->periodoTurma,
                'pessoa_id' => $ids

            ]);

            $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($turma->identificador, 'CRIADA');
                        }

            }


            $request->session()->flash('mensagem.sucesso','Turma foi adicionada com sucesso');

        return to_route('turma.index');
    }

    public function destroy($id, Request $request, EnviaEmail $enviaEmail)
    {

        $pessoa= Turma::find($id);

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($pessoa->identificador, 'REMOVIDA');
                        }

            }

        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','Turma foi removida com sucesso');


        return to_route('turma.index');
    }

    public function retornoJsonTurma()
    {
        return response()->json(
            Turma::query()->get(),
            200
        );
    }
}

