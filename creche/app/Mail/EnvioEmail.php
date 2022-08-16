<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class EnvioEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     *
     *
     */
    public $nomePessoa;
    public $titulo;

    public function __construct($nomePessoa, $titulo)
    {
        $this->nomePessoa = $nomePessoa;
        $this->titulo = $titulo;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mail.envioEmail');
    }
}
