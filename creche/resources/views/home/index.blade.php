<x-layout title="Página Principal">
    @csrf
    <div class="container">

        @foreach ($users as $user)


       <form action="home/email/{{$user->id}}" method="post">
        @csrf
        @method('PUT')
        <div class="input-group mb-3">
            <div class="input-group-prepend">
              <div class="input-group-text">
                <label for="">Habilitar/Desabilitar o envio de Email:</label>
                <input type="checkbox"
                           name="envioDeEmail"
                           value="{{ $user->id }}"
                           {{ $user->envioDeEmail ? 'checked' : '' }}>
              </div>
              <button class="btn btn-secondary mt-1">Salvar</button>
            </div>

          </div>

        </form>
        @endforeach

        <div class="jumbotron p-3 p-md-5 text-white rounded bg-dark">
          <div class="col-md-6 px-0">
            <h1 class="display-4 font-italic">Bem vindo ao sistema</h1>
            <h2 class="lead my-3">Cadastre alunos, professores e turmas.<br/>
                Visualise e os edite de forma rápida e prática. <br/>Ah, Temos os dados em Json também.</h2>

          </div>
        </div>

    </div>
</x-layout>
