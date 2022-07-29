<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    // protected $table = 'series'; ele coloca o nome da classe em minusculo e no plural então não precisa desse comando;
    public $timestamps = false;
    protected $fillable = ['nome'];
}
