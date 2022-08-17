<x-layout title="Perfil turma">

    @csrf

    <ul class="list-group mt-2">
        <li class="list-group-item d-flex justify-content-between align-items-center">

            Turma: {{ $turma->identificador }}<br />
            Materia: {{ $turma->materia }} <br />
            Periodo: {{ $turma->periodo }}

        </li>
    </ul>

    @if (isset($alunos))

        <div class=" row">
            <div class=" col col-6">
                <h4 class="form-label mt-4">Os alunos da turma:</h4>

                @foreach ($alunos as $aluno)
                    <ul class="list-group mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Matricula: {{ $aluno->matricula }}<br />
                            Nome: {{ $aluno->nome }} <br />
                            Tipo: {{ $aluno->tipo }}<br />

                        </li>

                    </ul>
                @endforeach

            </div>
    @endif
    @if (isset($professores))
        <div class="col col-6">
            <h4 class="form-label mt-4">Os professores da turma:</h4>

            @foreach ($professores as $professor)
                <ul class="list-group mt-2">
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        Matricula: {{ $professor->matricula }}<br />
                        Nome: {{ $professor->nome }} <br />
                        Tipo: {{ $professor->tipo }}<br />

                    </li>

                </ul>
            @endforeach

        </div>
        </div>
    @endif

</x-layout>
