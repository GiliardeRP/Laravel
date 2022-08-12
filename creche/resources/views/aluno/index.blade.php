<x-layout title="Alunos cadastrados:">


    @isset($mensagemSucesso)

        <div class="alert alert-success">
            {{$mensagemSucesso}}
        </div>
    @endisset

    @foreach ($alunos as $aluno)
    <ul class="list-group mt-2">
        <li class="list-group-item d-flex justify-content-between align-items-center" >
            Matricula: {{$aluno->matricula}}<br/>
            Nome: {{$aluno->nome}} <br/>
            Idade: {{$aluno->idade}}<br/>
            Cpf: {{$aluno->cpf}}<br/>
            Endereço: {{$aluno->endereco}}

            <div class="d-flex justify-content-between">
            <a href="aluno/edit/{{$aluno->id}}" class= "btn btn-second" href="">Editar</a>
            <form action="/aluno/{{$aluno->id}}" method="post">
                @csrf
                @method('DELETE')
            <button class= "btn btn-second">apagar</button>
        </form>
            </div>
        </li>


    </ul>

    @endforeach

<a class="btn btn-primary mt-4" href="aluno/create">Adicionar</a>
</form>

</x-layot>
