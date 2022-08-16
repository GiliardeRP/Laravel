<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Service\Cadastro;

class PessoaController extends Controller
{
    public function indexAluno(PessoaFormRequest $request)
    {
        $pessoas = Pessoa::query()->where('tipo','aluno')->get();



        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('aluno.index')->with('pessoas' , $pessoas)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function indexProfessor(PessoaFormRequest $request)
    {
        $pessoas = Pessoa::query()->where('tipo','professor')->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('professor.index')->with('pessoas' , $pessoas)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function createAluno()
    {
        return view('aluno.create');
    }
    public function createProfessor()
    {
        return view('professor.create');
    }

    public function store(PessoaFormRequest $request, Cadastro $cradastro){


        if(!isset($request->salarioPessoa)){

            $cradastro->cadastrar(
                $request->nomePessoa,
                $request->idadePessoa,
                $request->matriculaPessoa,
                $request->enderecoPessoa,
                $request->cpfPessoa,
                '',
                $request->tipoPessoa,
            );

            return redirect()->route('aluno.index');
        }

        $cradastro->cadastrar(
            $request->nomePessoa,
            $request->idadePessoa,
            $request->matriculaPessoa,
            $request->enderecoPessoa,
            $request->cpfPessoa,
            $request->salarioPessoa,
            $request->tipoPessoa,
        );




        return redirect()->route('professor.index');
    }
    public function destroyAluno($id, PessoaFormRequest $request)
    {

        $pessoa= Pessoa::find($id);

        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','O pessoa foi removido com sucesso');

        return to_route('aluno.index');
    }
    public function destroyProfessor($id, PessoaFormRequest $request)
    {

        $pessoa= Pessoa::find($id);

        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','O pessoa foi removido com sucesso');

        return to_route('professor.index');
    }
    public function editAluno(int $pessoaid )
    {
        $pessoa= Pessoa::find($pessoaid);

            return view('aluno.edit')->with('pessoa', $pessoa );

        }


    public function editProfessor(int $pessoaid )
    {
        $pessoa= Pessoa::find($pessoaid);

        return view('professor.edit')->with('pessoa', $pessoa );

        }


    public function updateAluno(PessoaFormRequest $request, $id)
    {

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());


        return to_route('aluno.index');
    }

    public function updateProfessor(PessoaFormRequest $request, $id)
    {

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());


        return to_route('professor.index');
    }
}
