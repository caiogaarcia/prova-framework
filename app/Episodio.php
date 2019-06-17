<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Episodio extends Model{

    //para nao dar erro de insercao nos campos que laravel cria automatico
    public $timestamps = false;

    //precisa colocar campos que podem ser alterados/adicionados
    protected  $fillable = ['numero'];

    //devolvendo relacionamento implementado em Temporada
    public function temporada()
    {
        return $this->belongsTo(Temporada::class);
    }

}
