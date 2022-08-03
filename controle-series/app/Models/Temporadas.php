<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
