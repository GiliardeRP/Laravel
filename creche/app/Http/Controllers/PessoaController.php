<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use App\Service\Cadastro;

class pessoaController extends Controller
{
    public function index(Request $request)
    {
        $pessoas = Pessoa::query()->get();
        $mensagemSucesso = $request->session()->get('mensagem.sucesso');
        return view('pessoa.index')->with('pessoas' , $pessoas)->with('mensagemSucesso', $mensagemSucesso);
    }
    public function create()
    {
        return view('pessoa.create');
    }

    public function store(Request $request, Cadastro $cradastro){

        

        $cradastro->cadastrar(
            $request->nomePessoa,
            $request->idadePessoa,
            $request->matriculaPessoa,
            $request->enderecoPessoa,
            $request->cpfPessoa,
            $request->salarioPessoa
        );

        return redirect()->route('pessoa.index');
    }
    public function destroy($id, Request $request)
    {
        $pessoa= Pessoa::find($id);
        $pessoa->delete();

        //pessoa::destroy($request->pessoa);

        $request->session()->flash('mensagem.sucesso','O pessoa foi removido com sucesso');

        return to_route('pessoa.index');
    }
    public function edit(int $pessoaid )
    {
        $pessoa= Pessoa::find($pessoaid);

        return view('pessoa.edit')->with('pessoa', $pessoa );
    }
    public function update(Request $request, $id)
    {

        $pessoa = Pessoa::find($id);
        $pessoa->update($request->all());


        return to_route('pessoa.index');
    }
}
