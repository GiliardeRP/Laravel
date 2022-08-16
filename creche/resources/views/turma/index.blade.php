<x-layout title="Turmas cadastradas">

    <form method="POST">
        @csrf
    @foreach ($turmas as $turma)
    <ul class="list-group mt-2">
        <li class="list-group-item d-flex justify-content-between align-items-center" >
            Turma:  {{$turma->identificador}}<br/>
            Materia: {{$turma->materia}} <br/>
            Periodo: {{$turma->periodo}}


            <div class="d-flex justify-content-between">

            {{-- <form action="{{ route('turma.destroy', $turma->id) }}" method="post">
                @csrf
                @method('DELETE')
            <button class= "btn btn-second">apagar</button>
        </form> --}}
            </div>
        </li>


    </ul>

    @endforeach

    <a class="btn btn-primary mt-4" href="turma/create">Adicionar</a>

    </form>
</x-layout>
