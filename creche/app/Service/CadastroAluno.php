<?php
namespace App\Service;

use App\Models\Aluno;
use Illuminate\Support\Facades\DB;

class CadastroAluno{



    public function cadastrar(string $nome, int $idade, string $matricula, string $cpf, string $endereco ): Aluno{


        $aluno = Aluno::create([
            'nome' => $nome,
            'idade' => $idade,
            'cpf' => $cpf,
            'endereco' => $endereco,
            'matricula' => $matricula
        ]);

        return $aluno;
    }
}


