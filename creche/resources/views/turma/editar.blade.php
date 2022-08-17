<x-layout title="Editar Turmas">

    <form method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col col-6">
            <label for="Identificador" class="form-label">Identificador da turma:</label>
            <input type="text" class="form-control" name='identificadorTurma' id="identificadorTurma"  value="{{$turma->identificador}}" >
            </div>


            <div class="col col-6">
                <label for="Materia" class="form-label">Materia:</label>
                <input type="text" class="form-control" name='materiaTurma' id="materiaTurma" value="{{$turma->materia}}" >
                </div>
                <div class="col col-2 mt-2">
                    <label for="Periodo" class="form-label">Periodo:</label>
                    <input type="text" class="form-control" name="periodoTurma" id="periodoTurma"  value="{{$turma->periodo}}">
                </div>
        </div>


        <div class=" row">
        <div class=" col col-6">
            <h4 class="form-label mt-4">Adicione dos alunos da turma:</h4>
        @foreach ($alunos as $aluno)
        <ul class="list-group mt-2">
            <li class="list-group-item d-flex justify-content-between align-items-center" >
                Matricula: {{$aluno->matricula}}<br/>
                Nome: {{$aluno->nome}} <br/>
                Tipo: {{$aluno->tipo}}<br/>


                <div class="d-flex justify-content-between">
                    <input type="checkbox"
                    name="pessoa_id[]"
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
            <li class="list-group-item d-flex justify-content-between align-items-center" >
                Matricula: {{$professor->matricula}}<br/>
                Nome: {{$professor->nome}} <br/>
                Tipo: {{$professor->tipo}}<br/>


                <div class="d-flex justify-content-between">
                    <input type="checkbox"
                    name="pessoa_id[]"
                    value="{{ $professor->id }}"{{ $professor->participa ? 'checked' : '' }}>
                </div>
            </li>


        </ul>

        @endforeach
        </div>
        </div>



        <button  class="btn btn-primary mt-4">Salvar</button>

      </form>


</x-layout>
