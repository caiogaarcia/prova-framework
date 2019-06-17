<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{

    //para nao dar erro de insercao nos campos que laravel cria automatico
    public $timestamps = false;

    //precisa colocar campos que podem ser alterados/adicionados
    protected  $fillable = ['numero'];
    //
    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }

    //devolvendo relacionamento implementado em Serie
    public function serie()
    {
        return $this->belongsTo(Serie::class);
    }
}
