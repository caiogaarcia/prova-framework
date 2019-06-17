<?php


namespace App;


use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    //para nao dar erro de insercao nos campos que laravel cria automatico
    public $timestamps = false;

    //precisa colocar campos que podem ser alterados/adicionados
    protected  $fillable = ['nome'];
    
    //relacionamento com Temporada
    public function temporadas(){
        //essa classe tem muitas Temporadas
        return $this->hasMany(Temporada::class);
    }
}