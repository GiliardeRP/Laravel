<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{

    public function create()
    {
        return view('usuario.create');
    }

    public function store(Request $request)
    {
        $dado = $request->except(['_token']);
        $dado['password'] = Hash::make($dado['password']);
        $usuario = User::create($dado);

        Auth::login($usuario);

        return to_route('home.index');
    }
}
