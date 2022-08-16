<?php

namespace App\http\Controllers;

use App\Models\{Turma, Pessoa};
use Illuminate\Http\Request;

class TurmaController
{
    public function index()
    {
        $turma = Turma::query()->get();

        return view('turma.index')->with('turmas', $turma);
    }

    public function create(){
        $aluno = Pessoa::all()->where('tipo', 'aluno');
        $professor = Pessoa::all()->where('tipo', 'professor');

        return view('turma.create')->with('alunos', $aluno)->with('professores', $professor);
    }

    public function store(Turma $turma, Pessoa $pessoa, Request $request){

        $ids = count($request->pessoa_id);


        for ($i=1; $i<$ids ; $i++ ) {

            $id = $request->pessoa_id[$i];

            $turma = Turma::create([
                'identificador' => $request->identificadorTurma,
                'materia' => $request->materiaTurma,
                'periodo' => $request->periodoTurma,
                'pessoa_id' => $id

            ]);

        }





        return to_route('turma.index');
    }

    public function destroy($id, Request $request)
    {

        $pessoa= Turma::find($id);

        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','O pessoa foi removido com sucesso');

        return to_route('turma.index');
    }
}

