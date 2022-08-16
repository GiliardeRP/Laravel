<?php

namespace App\Http\Controllers;

use App\Http\Requests\PessoaFormRequest;
use App\Mail\EnvioEmail;
use App\Models\Pessoa;
use App\Models\User;
use Illuminate\Http\Request;
use App\Service\Cadastro;
use App\Service\EnviaEmail;
use Illuminate\Support\Facades\Mail;

class PessoaController extends Controller
{
    public function indexAluno(Request $request)
    {
        $pessoas = Pessoa::query()->where('tipo','aluno')->get();

        $mensagemSucesso = $request->session()->get('mensagem.sucesso');

        return view('aluno.index')->with('pessoas' , $pessoas)->with('mensagemSucesso', $mensagemSucesso);
    }

    public function indexProfessor(Request $request)
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

    public function store(PessoaFormRequest $request, Cadastro $cradastro, EnviaEmail $enviaEmail){


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

            $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($request->nomePessoa, 'ADICIONADA');
                        }

            }



            $request->session()->flash('mensagem.sucesso','Pessoa foi adicionada com sucesso');

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

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($request->nomePessoa, 'ADICIONADA');
                        }

            }



        $request->session()->flash('mensagem.sucesso','Pessoa foi adicionada com sucesso');

        return redirect()->route('professor.index');
    }
    public function destroyAluno($id, Request $request, EnviaEmail $enviaEmail)
    {

        $pessoa= Pessoa::find($id);

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($pessoa->nome, 'DELETADA');
                        }

            }


        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','Pessoa foi removida com sucesso');

        return to_route('aluno.index');
    }
    public function destroyProfessor($id, Request $request, EnviaEmail $enviaEmail)
    {

        $pessoa= Pessoa::find($id);

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($pessoa->nome, 'DELETADA');
                        }

            }


        $pessoa->delete();
        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','Pessoa foi removida com sucesso');

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


    public function updateAluno(Request $request, $id, EnviaEmail $enviaEmail)
    {

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($pessoa->nome, 'EDITADA');
                        }

            }

        $request->session()->flash('mensagem.sucesso','Pessoa foi alterada com sucesso');
        return to_route('aluno.index');


    }

    public function updateProfessor(Request $request, $id, EnviaEmail $enviaEmail)
    {

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());

        $users = User::all();
            foreach($users as $user){

            if($user->envioDeEmail == true){

                            $enviaEmail->enviar($pessoa->nome, 'EDITADA');
                        }

            }

        $request->session()->flash('mensagem.sucesso','Pessoa foi alterada com sucesso');
        return to_route('professor.index');
    }
    public function retornoJsonAluno()
    {
        return response()->json(
            Pessoa::query()->where('tipo','aluno')->get(),
            200
        );
    }
    public function retornoJsonProfessor()
    {
        return response()->json(
            Pessoa::query()->where('tipo','professor')->get(),
            200
        );
    }

}
