<x-layout title="Edite o cadastro: ">

<form action="{{route('aluno.update', $pessoa->id)}}" method="POST">
    @csrf

    @isset($pessoa->nome)

    @method('PUT')

    @endisset
    <div class="row">
        <div class="col col-6">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name='nome' id="nomeEditado" value="{{$pessoa->nome}}">
            </div>


            <div class="col col-6">
                <label for="Matricula" class="form-label">Matricula</label>
                <input type="text" class="form-control" name='matricula' id="matriculapessoa" value="{{$pessoa->matricula}}">
                </div>
                <div class="col col-2">
                    <label for="Idade" class="form-label">Idade</label>
                    <input type="number" class="form-control" name="idade" id="idadepessoa" value="{{$pessoa->idade}}">
                </div>
                <div class="col col-4">
                    <label for="Cpf" class="form-label">Cpf</label>
                    <input type="text" class="form-control" name='cpf' id="cpfpessoa"value="{{$pessoa->cpf}}" >
                    </div>
                    <div class="col col-12">
                        <label for="Endereco" class="form-label">Endereco</label>
                        <input type="text" class="form-control" name='endereco' id="enderecopessoa"value="{{$pessoa->endereco}}" >
                        </div>

                        <div class="col col-12">
                            <label for="tipo" class="form-label">Tipo:</label>
                            <input type="radio" id="tipoPessoa" name="tipoPessoa" value="aluno">
                            <label for="sexo-m">Aluno</label>
                            <input type="radio" id="tipoPessoa" name="tipoPessoa" value="professor">
                            <label for="sexo-m">Professor</label>
                            </div>
    <button  class="btn btn-primary mt-4">Salvar</button>
  </form>

</x-layout>
