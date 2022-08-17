<x-layout title="Adicione uma nova Turma">

    <form method="POST" onsubmit="return confirm('Tem certeza que deseja salvar?')">
        @csrf
        <div class="row">
            <div class="col col-6">
                <label for="Identificador" class="form-label">Identificador da turma:</label>
                <input type="text" class="form-control" name='identificadorTurma' id="identificadorTurma">
            </div>


            <div class="col col-6">
                <label for="Materia" class="form-label">Materia:</label>
                <input type="text" class="form-control" name='materiaTurma' id="materiaTurma">
            </div>
            <div class="col col-2 mt-2">
                <label for="Periodo" class="form-label">Periodo:</label>
                <input type="text" class="form-control" name="periodoTurma" id="periodoTurma">
            </div>
        </div>


        <div class=" row">
            <div class=" col col-6">
                <h4 class="form-label mt-4">Adicione dos alunos da turma:</h4>
                @foreach ($alunos as $aluno)
                    <ul class="list-group mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Matricula: {{ $aluno->matricula }}<br />
                            Nome: {{ $aluno->nome }} <br />
                            Tipo: {{ $aluno->tipo }}<br />


                            <div class="d-flex justify-content-between">
                                <input type="checkbox" name="pessoa_id[]"
                                    value="{{ $aluno->id }}"{{ $aluno->participa ? 'checked' : '' }}>
                            </div>
                        </li>


                    </ul>
                @endforeach

            </div>

            <div class="col col-6">
                <h4 class="form-label mt-4">Adicione os professores da turma:</h4>
                @foreach ($professores as $professor)
                    <ul class="list-group mt-2">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Matricula: {{ $professor->matricula }}<br />
                            Nome: {{ $professor->nome }} <br />
                            Tipo: {{ $professor->tipo }}<br />


                            <div class="d-flex justify-content-between">
                                <input type="checkbox" name="pessoa_id[]"
                                    value="{{ $professor->id }}"{{ $professor->participa ? 'checked' : '' }}>
                            </div>
                        </li>


                    </ul>
                @endforeach
            </div>
        </div>



        <button class="btn btn-primary mt-4">Salvar</button>

    </form>

</x-layout>




{{-- <form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group">
            @foreach ($episodios as $episodio)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio {{ $episodio->numero }}
                    <input type="checkbox"
                           name="episodios[]"
                           value="{{ $episodio->id }}"
                           {{ $episodio->assistido ? 'checked' : '' }}>
                </li>

            @endforeach
        </ul>
        <button class="btn btn-primary mt-2 mb-2">Salvar</button>
    </form> --}}
