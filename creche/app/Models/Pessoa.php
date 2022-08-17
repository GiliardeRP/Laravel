<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pessoa extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = ['idade', 'nome', 'matricula', 'cpf', 'endereco',  'salario', 'tipo'];
    protected $table = 'pessoa';

   

}
