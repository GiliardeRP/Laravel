<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostoController extends Controller
{
    public function index()
    {
        return view('inicio.index');
    }
}
