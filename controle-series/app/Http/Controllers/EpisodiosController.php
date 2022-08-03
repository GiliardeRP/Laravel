<?php

namespace App\Http\Controllers;

use App\Models\Episodios;
use App\Models\Temporadas;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Symfony\Component\VarDumper\VarDumper;

class EpisodiosController extends Controller
{
    public function index(Temporadas $temporada, Request $request)
{

    return view('episodios.index', [
        'episodios' => $temporada->episodios,
        'temporadaId' => $temporada->id,
        'mensagem' => $request->session()->get('mensagem')
    ]);
}

public function assistir(Temporadas $temporada, Request $request)
{
    $episodiosAssistidos = $request->episodios;
    $temporada->episodios->each(function (Episodios $episodio)
    use ($episodiosAssistidos)
    {
        $episodio->assistido = in_array(
            $episodio->id,
            $episodiosAssistidos
        );
    });

    $temporada->push();
    $request->session()->flash('mensagem', 'Episódios marcados como assistidos');


    return redirect()->back();

}

}
