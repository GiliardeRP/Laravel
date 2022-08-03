<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Episodios extends Model
{

    public $timestamps = false;
    protected $fillable = ['numero'];

    public function temporadas()
    {
        return $this->belongsTo(Temporada::class);
    }
}
