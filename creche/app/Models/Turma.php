<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{

    use HasFactory;

    public function turma(){
        return $this->hasMany(Aluno ::class, Professor::class);
    }
}
