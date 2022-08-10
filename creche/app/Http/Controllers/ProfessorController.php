<?php

namespace App\Http\Controllers;

use App\Models\Aluno;
use Illuminate\Http\Request;
use App\Service\CadastroAluno;

class AlunoController extends Controller
{
    public function index(Request $request)
    {
        $alunos = Aluno::query()->get();

        return view('aluno.index', compact('escolas'));
    }

    public function create(Request $request)
    {
        return view('aluno.create');
    }

    public function store(Request $request, CadastroAluno $cradastroAluno){

        $alunos = $cradastroAluno->cadastrar(
            $request->nomeAluno,
            $request->idadeAluno,
            $request->matriculaAluno,
            $request->enderecoAluno,
            $request->cpfAluno
        );

        return redirect()->route('listar_crianca');
    }
    public function destroy($id)
    {
        $aluno= Aluno::find($id);
        $aluno->delete();

        return redirect('/escola');
    }


    public function edit(int $id, Request $request)
    {
        $alunos = Aluno::find($id);

        return view('aluno.edit', compact('alunos'));
    }

    public function editar(int $id, Request $request)
    {
        $aluno = Aluno::find($id);

        $aluno->nome = $request->nomeEditado;
        $aluno->idade = $request->idadeEditado;
        $aluno->save();

        return redirect('/escola');
    }
}
