<x-layout title="Edite o cadastro: ">

<form action="{{route('aluno.update', $aluno->id)}}" method="POST">
    @csrf

    @isset($aluno->nome)

    @method('PUT')

    @endisset
    <div class="row">
        <div class="col col-6">
            <label for="Nome" class="form-label">Nome</label>
            <input type="text" class="form-control" name='nome' id="nomeEditado" value="{{$aluno->nome}}">
            </div>


            <div class="col col-6">
                <label for="Matricula" class="form-label">Matricula</label>
                <input type="text" class="form-control" name='matricula' id="matriculaAluno" value="{{$aluno->matricula}}">
                </div>
                <div class="col col-2">
                    <label for="Idade" class="form-label">Idade</label>
                    <input type="number" class="form-control" name="idade" id="idadeAluno" value="{{$aluno->idade}}">
                </div>
                <div class="col col-4">
                    <label for="Cpf" class="form-label">Cpf</label>
                    <input type="text" class="form-control" name='cpf' id="cpfAluno"value="{{$aluno->cpf}}" >
                    </div>
                    <div class="col col-12">
                        <label for="Endereco" class="form-label">Endereco</label>
                        <input type="text" class="form-control" name='endereco' id="enderecoAluno"value="{{$aluno->endereco}}" >
                        </div>
    <button  class="btn btn-primary mt-4">Salvar</button>
  </form>

</x-layout>
