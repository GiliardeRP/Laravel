@extends('layout')

@section('cabecalho')
    Temporadas de {{ $serie->nome }}
@endsection

@section('conteudo')
    <ul class="list-group">
        @foreach($temporadas as $temporada)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{$temporada->id}}/episodios">
                    Temporada {{ $temporada->numero }}
                </a>


                <button type="button" class="btn btn-primary">
                    <span class="badge badge-light">
                        {{$temporada->getEpisodiosAssistidos()->count()}} / {{ $temporada->episodios->count() }}
                    </span>
                    <span class="sr-only">unread messages</span>
                  </button>


            </li>
        @endforeach
    </ul>

@endsection
