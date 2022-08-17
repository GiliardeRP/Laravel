<x-layout title="Página Principal">
    @csrf
    <div class="container">

        @foreach ($users as $user)
            <form action="home/email/{{ $user->id }}" method="post">
                @csrf
                @method('PUT')
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <div class="input-group-text">
                            <label for="">Habilitar/Desabilitar o envio de Email:</label>
                            <input type="checkbox" name="envioDeEmail" value="{{ $user->id }}"
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
                <h2 class="lead my-3">Cadastre alunos, professores e turmas.<br />
                    Visualise e os edite de forma rápida e prática. <br />Ah, Temos os dados em Json também.</h2>

            </div>
        </div>

        <div class="bg-light me-md-3 pt-3 px-3 px-md-5 text-center overflow-hidden">
            <div class="my-3 p-3">
                <h2 class="display-5">Funções do Sistema:</h2>

            </div>
            <div class="bg-dark shadow-sm mx-auto" style="width: 80%; height: 300px; border-radius: 21px 21px 0 0;">

                <ul class="list-group mt-3">
                    <li class="list-group-item d-flex justify-content-between align-items-center mt-4 mx-2">
                        Crud Completo de Alunos, Professores e Turmas
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center mt-4 mx-2">
                        Autentificação
                    </li>
                    <li class="list-group-item d-flex justify-content-between aling-items-center mt-4 mx-2">
                        Envio de e-mails(opcional) sempre que algum elemento for criado, alterado ou excluido.
                    </li>
                </ul>

            </div>
        </div>

    </div>
</x-layout>
