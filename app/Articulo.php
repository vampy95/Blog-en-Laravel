<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articulo extends Model
{
    //Indicamos el nombre de la tabla para este modelo
    protected $table='articulos';

    //Atibutos que podemos insertar en la base de datos
    protected $fillable = ['title', 'description', 'content'];
    
    //Un articulo pertenece a un usuario
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //Relacion de muchos a muchos
    public function categorias()
    {
        return $this->belongsToMany('App\Categoria');
    }

}
