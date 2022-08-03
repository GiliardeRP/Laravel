<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PhpParser\ErrorHandler\Collecting;

class Temporadas extends Model
{
    public $timestamps = false;
    protected $fillable = ['numero'];


    public function episodios()
    {
        return $this->hasMany( Episodios::class);
    }

    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
    public function getEpisodiosAssistidos(): Collection
    {
        return $this->episodios->filter(function (Episodios $episodios) {
            return $episodios->assistido;
        });
    }
}
