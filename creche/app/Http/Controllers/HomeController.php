<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController{

    public function index()
    {
        $user= User::query()->get();


        return view('home.index')->with('users', $user);
    }

    public function email(Request $request)
    {

        if(isset($request->envioDeEmail)){
            $user = User::find($request->id);

                    $user->envioDeEmail = true;
                    $user->push();

            return to_route('home.index');
        }
        $user = User::find($request->id);
                    $user->envioDeEmail = false;
                    $user->push();
            return to_route('home.index');


    }
}



