<x-layout title="Turmas cadastradas">

    @isset($mensagemSucesso)
        <div class="alert alert-success">
            {{ $mensagemSucesso }}
        </div>
    @endisset

    <div class="d-flex justify-content-between">
        <a class="btn btn-primary " href="turma/create">Adicionar</a>
        <a class="btn btn-primary " href="api/json/turma">Ver Json completo</a>
    </div>

    @foreach ($turmas as $turma)
        <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center">

                Turma: {{ $turma->identificador }}<br />
                Materia: {{ $turma->materia }} <br />
                Periodo: {{ $turma->periodo }}


                <div class="d-flex justify-content-between">
                    <a href="turma/list/{{ $turma->id }}" class="btn btn-second" href="">Ver Turma</a>
                    <a href="turma/edit/{{ $turma->id }}" class="btn btn-second" href="">Editar</a>

                    <form action="{{ route('turma.destroy', $turma->id) }}" method="post"
                        onsubmit="return confirm('Tem certeza que deseja apagar?')">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-second">apagar</button>
                    </form>
                </div>
            </li>


        </ul>
    @endforeach



    </form>
</x-layout>
