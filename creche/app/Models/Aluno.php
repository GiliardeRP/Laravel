<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aluno extends Model
{


    public $timestamps = false;

    protected $fillable = ['idade', 'nome', 'matricula', 'cpf', 'endereco'];
    protected $table = 'aluno';


    public function Aluno(){
        return $this->hasMany(Aluno::class);
    }

}
