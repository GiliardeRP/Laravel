<?php

namespace App\Service;


use App\Mail\EnvioEmail;
use Illuminate\Support\Facades\Mail;




class EnviaEmail
{



    public function enviar($nomePessoa, $status)
    {
        $email = new EnvioEmail($nomePessoa, $status);

        $user = (object)['email' => 'g1l14rd3@gmail.com', 'name' => 'Giliarde'];

        Mail::to($user)->send($email);
    }
}
