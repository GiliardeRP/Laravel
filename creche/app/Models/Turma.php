<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{

    use HasFactory;

    public $timestamps = false;
    protected $table = 'turma';
    protected $fillable = ['identificador', 'materia' ,'periodo', 'pessoa_id'];

    public function turma(){
        return $this->hasMany(Aluno ::class, Professor::class);
    }
}
