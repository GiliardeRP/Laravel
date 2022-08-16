<x-layout title="Adicione um novo Professor">

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-6">
        <label for="Nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name='nomePessoa' id="nomePessoa" >
        </div>


        <div class="col col-6">
            <label for="Matricula" class="form-label">Matricula</label>
            <input type="text" class="form-control" name='matriculaPessoa' id="matriculaPessoa" >
            </div>
            <div class="col col-2">
                <label for="Idade" class="form-label">Idade</label>
                <input type="number" class="form-control" name="idadePessoa" id="idadePessoa" >
            </div>
            <div class="col col-4">
                <label for="Cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" name='cpfPessoa' id="cpfPessoa" >
                </div>
                <div class="col col-12">
                    <label for="Endereco" class="form-label">Endereco</label>
                    <input type="text" class="form-control" name='enderecoPessoa' id="enderecoPessoa" >
                    </div>
                    <div class="col col-12">
                    <label for="Salario" class="form-label">Salario</label>
                    <input type="text" class="form-control" name='salarioPessoa' id="salarioPessoa" >
                    </div>
                    <div class="col col-12">
                        <label for="tipo" class="form-label">Tipo:</label>
                        <input type="radio" id="tipoPessoa" name="tipoPessoa" value="aluno">
                        <label for="sexo-m">Aluno</label>
                        <input type="radio" id="tipoPessoa" name="tipoPessoa" value="professor">
                        <label for="sexo-m">Professor</label>
                        </div>
    </div>
    <button  class="btn btn-primary mt-4">Salvar</button>
  </form>

</x-layout>



