<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SeriesFormRequest;
use App\Models\Series;
use App\Repositories\SeriesRepository;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $seriesRepository)
    {

    }
    public function index()
    {
        return Series::all();
    }

    public function store(SeriesFormRequest $request)
    {


        return response()->json($this->seriesRepository->add($request), 201);
    }

    public function show(int $series)
    {
       // $series = Series::whereId($series)->with('seasons.episodes')->get();

        //->get() = coleção
        //->fist() = une

        $seriesModel = Series::with('seasons.episodes')->find($series);
        if($seriesModel === null){
            return response()->json(['message' => 'Seris não encontrada'], 404);
        }


        return $seriesModel;
    }
    public function update(Series $series, SeriesFormRequest $request)
    {
        $series->fill($request->all());
        $series->save();

        return $series;

    }
    public function destroy(int $series){

        Series::destroy($series);
        return response()->noContent();

    }
}
