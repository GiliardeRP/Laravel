<?php
namespace App\Service;

use App\Models\Pessoa;

use App\Models\Turma;

use Illuminate\Support\Facades\DB;

class Cadastro{



    public function cadastrar(string $nome, int $idade, string $matricula, string $cpf, string $endereco, string $salario ): Pessoa{


        $pessoa = Pessoa::create([
            'nome' => $nome,
            'idade' => $idade,
            'cpf' => $cpf,
            'endereco' => $endereco,
            'matricula' => $matricula,
            'salario' => $salario
        ]);

        return $pessoa;
    }



}
