<x-layout title="Adicione um novo aluno">

<form method="POST">
    @csrf
    <div class="row">
        <div class="col col-6">
        <label for="Nome" class="form-label">Nome</label>
        <input type="text" class="form-control" name='nomeAluno' id="nomeAluno" >
        </div>


        <div class="col col-6">
            <label for="Matricula" class="form-label">Matricula</label>
            <input type="text" class="form-control" name='matriculaAluno' id="matriculaAluno" >
            </div>
            <div class="col col-2">
                <label for="Idade" class="form-label">Idade</label>
                <input type="number" class="form-control" name="idadeAluno" id="idadeAluno" >
            </div>
            <div class="col col-4">
                <label for="Cpf" class="form-label">Cpf</label>
                <input type="text" class="form-control" name='cpfAluno' id="cpfAluno" >
                </div>
                <div class="col col-12">
                    <label for="Endereco" class="form-label">Endereco</label>
                    <input type="text" class="form-control" name='enderecoAluno' id="enderecoAluno" >
                    </div>
    </div>
    <button  class="btn btn-primary mt-4">Salvar</button>
  </form>

</x-layout>



