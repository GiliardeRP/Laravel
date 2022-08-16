<?php
namespace App\Service;

use App\Models\Pessoa;



use Illuminate\Support\Facades\DB;

class Cadastro{



    public function cadastrar(string $nomePessoa, int $idade, string $matricula, string $cpf, string $endereco, string $salario, string $tipo): Pessoa{


        $pessoa = Pessoa::create([
            'nome' => $nomePessoa,
            'idade' => $idade,
            'cpf' => $cpf,
            'endereco' => $endereco,
            'matricula' => $matricula,
            'salario' => $salario,
            'tipo' => $tipo
        ]);

        return $pessoa;
    }



}
