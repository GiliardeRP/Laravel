<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Foreach_;

class SeriesController extends Controller
{
    public function index(){
        $series = [
            'Grey\'s Anatomy',
            'Serjão Berranteiro',
            'BaybedoBaybe'
        ];


        return view( 'series.index', compact('series'));
    }
}
