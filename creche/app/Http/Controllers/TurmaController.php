<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PessoaFormRequest;
use App\Models\{Turma, Pessoa, User};
use App\Service\EnviaEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class TurmaController extends Controller
{
    public function index(Request $request)
    {
        $turma = Turma::query()->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('turma.index')->with('turmas', $turma)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function create()
    {
        $aluno = Pessoa::all()->where('tipo', 'aluno');
        $professor = Pessoa::all()->where('tipo', 'professor');

        return view('turma.create')->with('alunos', $aluno)->with('professores', $professor);
    }

    public function store(Turma $turma, Request $request, EnviaEmail $enviaEmail)
    {
        //dd(auth()->user());

        $ids = $request->pessoa_id;

        DB::beginTransaction();

        $turma = Turma::create([
            'identificador' => $request->identificadorTurma,
            'materia' => $request->materiaTurma,
            'periodo' => $request->periodoTurma,
        ]);


        if (isset($request->pessoa_id)) {
            $arrIds = [];
            foreach ($ids as $id) {
                $arrIds[] = $id;
            }

            $turma->pessoa()->sync($arrIds);
        }

        DB::commit();

        $users = User::all();
        foreach ($users as $user) {

            if ($user->envioDeEmail == true) {

                $enviaEmail->enviar($turma->identificador, 'CRIADA');
            }
        }

        $request->session()->flash('mensagem.sucesso', 'Turma foi adicionada com sucesso');

        return to_route('turma.index');
    }

    public function destroy($id, Request $request, EnviaEmail $enviaEmail)
    {

        $pessoa = Turma::find($id);

        $users = User::all();
        foreach ($users as $user) {

            if ($user->envioDeEmail == true) {

                $enviaEmail->enviar($pessoa->identificador, 'REMOVIDA');
            }
        }

        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso', 'Turma foi removida com sucesso');

        return to_route('turma.index');
    }

    public function edit($id)
    {
        $turma = Turma::find($id);
        $aluno = Pessoa::all()->where('tipo', 'aluno');
        $professor = Pessoa::all()->where('tipo', 'professor');

        return view('turma.editar')->with('turma', $turma)->with('alunos', $aluno)->with('professores', $professor);
    }

    public function update($id, Request $request, EnviaEmail $enviaEmail)
    {

        $ids = $request->pessoa_id;

        DB::beginTransaction();

        $turma = Turma::find($id);

        $turma->delete();

        $turma = Turma::create([
            'identificador' => $request->identificadorTurma,
            'materia' => $request->materiaTurma,
            'periodo' => $request->periodoTurma,
        ]);

        if (isset($request->pessoa_id)) {
            foreach ($ids as $id) {
                $turma->pessoa()->attach($id);
            }
        }

        DB::commit();

        $users = User::all();
        foreach ($users as $user) {

            if ($user->envioDeEmail == true) {

                $enviaEmail->enviar($turma->identificador, 'Editada');
            }
        }

        $request->session()->flash('mensagem.sucesso', 'Turma foi editada com sucesso');

        return to_route('turma.index');
    }

    public function list($id)
    {
        // $aluno = Pessoa::all()->where('tipo', 'aluno');
        // $professor = Pessoa::all()->where('tipo', 'professor');

        $turma = Turma::find($id);

        $pessoas = $turma->pessoa;

        foreach ($pessoas as $professor) {
            if ($professor->tipo == 'professor') {
                $professorList[] = $professor;
            }
        }

        foreach ($pessoas as $aluno) {
            if ($aluno->tipo == 'aluno') {
                $alunoList[] = $aluno;
            }
        }

        if (isset($professorList)) {

            if (isset($alunoList)) {
                return view('turma.list')->with('turma', $turma)->with('alunos', $alunoList)->with('professores', $professorList);
            }
            return view('turma.list')->with('turma', $turma)->with('professores', $professorList);
        }

        if (isset($alunoList)) {
            return view('turma.list')->with('turma', $turma)->with('alunos', $alunoList);
        }
        return view('turma.list')->with('turma', $turma);
    }

    public function retornoJsonTurma()
    {

        $turma = Turma::query()->get();
        $pessoa = Pessoa::query()->get();

        return response()->json(
            [
                $turma, $pessoa
            ],
            200
        );
    }
}
