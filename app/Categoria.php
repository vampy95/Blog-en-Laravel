<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    //Indicamos el nombre de la tabla para este modelo
    protected $table = 'categorias';

    protected $fillable = ['nombre'];

    //Relacion de muchos a muchos
    public function articulos()
    {
        return $this->belongsToMany('App\Articulo');
    }

}
