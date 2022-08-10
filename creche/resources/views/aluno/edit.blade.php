@extends('layout')

@section('cabecalho')
    <h2>Edite o cadastro: </h2>

@endsection

@section('conteudo')

<form  method="POST">
    @csrf
    <div class="row">
        <div class="col col-8">
        <label for="Nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name='nomeEditado' id="nomeEditado" value="{{$escolas->nome}}" >
        </div>

        <div class="col col-2">
            <label for="Idade" class="form-label">Idade</label>
            <input type="number" class="form-control" name="idadeEditado" id="idadeEditado" value="{{$escolas->idade}}">
        </div>
    </div>
    <button  class="btn btn-primary mt-4">Salvar</button>
  </form>

@endsection
