@extends('layout')

@section('cabecalho')
<h2> Alunos cadastrados:</h2>
@endsection


@section('conteudo')



    @foreach ($escolas as $escola)
    <ul class="list-group mt-2">
        <li class="list-group-item d-flex justify-content-between align-items-center" >
            Matricula: {{$escola->matricula}}<br/>
            Nome: {{$escola->nome}} <br/>
            Idade: {{$escola->idade}}<br/>
            Cpf: {{$escola->cpf}}<br/>
            Endereço: {{$escola->endereco}}

            <div class="d-flex justify-content-between">
            <a href="escola/edit/{{$escola->id}}" class= "btn btn-second" href="">Editar</a>
            <form action="/escola/{{$escola->id}}" method="post">
                @csrf
                @method('DELETE')
            <button class= "btn btn-second">apagar</button>
        </form>
            </div>
        </li>


    </ul>

    @endforeach







<a class="btn btn-primary mt-4" href="escola/create">Adicionar</a>
</form>


@endsection
