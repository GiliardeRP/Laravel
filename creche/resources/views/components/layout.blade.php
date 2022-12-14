<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola - {{ $title }}</title>
    <!-- CSS bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>

<body>

    <nav class="py-2 bg-light border-bottom">
        <div class="container d-flex flex-wrap">
            <ul class="nav me-auto">
                @auth

                    <li class="nav-item"><a href="{{ route('home.index') }}" class="nav-link link-dark px-2 active"
                            aria-current="page">Home</a></li>
                    <li class="nav-item"><a href="{{ route('aluno.index') }}" class="nav-link link-dark px-2">Alunos </a>
                    </li>
                    <li class="nav-item"><a href="{{ route('professor.index') }}"
                            class="nav-link link-dark px-2">Professores</a></li>
                    <li class="nav-item"><a href="{{ route('turma.index') }}" class="nav-link link-dark px-2">Turmas</a>
                    </li>
                @endauth

            </ul>
            <ul class="nav">
                <!--<li class="nav-item"><a href="#" class="nav-link link-dark px-2">Login</a></li>-->
                @auth

                    <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link link-dark px-2">Sair</a></li>
                @endauth
            </ul>
        </div>
    </nav>
    <header class="py-3 mb-4 border-bottom">
        <div class="container d-flex flex-wrap justify-content-center">
            <a href="#" class="d-flex align-items-center mb-3 mb-lg-0 me-lg-auto text-dark text-decoration-none">

                <span class="fs-4">{{ $title }}</span>
            </a>

            {{-- <form class="col-12 col-lg-auto mb-3 mb-lg-0" role="search">
        @auth

        <input type="search" class="form-control" placeholder="Search..." aria-label="Search">@endauth
      </form> --}}
        </div>
        <div class="container">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @isset($mensagemSucesso)
                <div class="alert alert-success">
                    {{ $mensagemSucesso }}
                </div>
            @endisset
        </div>
    </header>

    <div class="b-example-divider"></div>
    <div class="container">
        {{ $slot }}
    </div>



</body>

</html>
