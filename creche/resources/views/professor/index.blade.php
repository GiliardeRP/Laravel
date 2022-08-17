<x-layout title="Professores cadastrados:">


    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="d-flex justify-content-between">
        <a class="btn btn-primary " href="professor/create">Adicionar</a>
        <a class="btn btn-primary " href="api/json/professor">Ver Json Completo</a>
    </div>

    @foreach ($pessoas as $pessoa)
        <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">
                Matricula: {{ $pessoa->matricula }}<br />
                Nome: {{ $pessoa->nome }} <br />
                Idade: {{ $pessoa->idade }}<br />
                Cpf: {{ $pessoa->cpf }}<br />
                Endereço: {{ $pessoa->endereco }}<br />
                Salario: {{ $pessoa->salario }}

                <div class="d-flex justify-content-between">
                    <a href="pessoa/editprofessor/{{ $pessoa->id }}" class="btn btn-second" href="">Editar</a>
                    <form action="/professor/{{ $pessoa->id }}" method="post"
                        onsubmit="return confirm('Tem certeza que deseja apagar?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-second">Apagar</button>
                    </form>
                </div>
            </li>


        </ul>
    @endforeach

    </form>

    </x-layot>
