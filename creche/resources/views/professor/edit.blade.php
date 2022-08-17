<x-layout title="Edite o cadastro: ">

    <form action="{{ route('professor.update', $pessoa->id) }}" method="POST"
        onsubmit="return confirm('Tem certeza que deseja salvar alterações?')">
        @csrf

        @isset($pessoa->nome)
            @method('PUT')
        @endisset
        <div class="row">
            <div class="col col-6">
                <label for="Nome" class="form-label">Nome</label>
                <input type="text" class="form-control" name='nome' id="nomeEditado" value="{{ $pessoa->nome }}">
            </div>


            <div class="col col-6">
                <label for="Matricula" class="form-label">Matricula</label>
                <input type="text" class="form-control" name='matriculaPessoa' id="matriculaPessoa"
                    value="{{ $pessoa->matricula }}">
            </div>
            <div class="col col-2">
                <label for="Idade" class="form-label">Idade</label>
                <input type="number" class="form-control" name="idadePessoa" id="idadePessoa"
                    value="{{ $pessoa->idade }}">
            </div>
            <div class="col col-4">
                <label for="Cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" name='cpfPessoa' id="cpfPessoa"value="{{ $pessoa->cpf }}">
            </div>
            <div class="col col-12">
                <label for="Endereco" class="form-label">Endereco</label>
                <input type="text" class="form-control" name='enderecoPessoa'
                    id="enderecoPessoa"value="{{ $pessoa->endereco }}">
            </div>

            <div class="col col-12">
                <label for="Salario" class="form-label">Salario</label>
                <input type="text" class="form-control" name='salarioPessoa'
                    id="salarioPessoa"value="{{ $pessoa->salario }}">
            </div>

            <div class="col col-12">
                <label for="tipo" class="form-label">Tipo:</label>
                <input type="radio" id="tipoPessoa" name="tipoPessoa" value="aluno">
                <label for="sexo-m">Aluno</label>
                <input type="radio" id="tipoPessoa" name="tipoPessoa" value="professor">
                <label for="sexo-m">Professor</label>
            </div>



            <button class="btn btn-primary mt-4">Salvar</button>
    </form>

</x-layout>
