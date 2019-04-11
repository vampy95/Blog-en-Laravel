<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArticuloCategoria extends Model
{
    //Indicamos el nombre de la tabla para este modelo
    protected $table = "articulo_categoria";

    //Atibutos que podemos insertar en la base de datos
    protected $fillable = ['articulo_id', 'categoria_id'];

}
