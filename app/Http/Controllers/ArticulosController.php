<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//Validate FromRequest
use App\Http\Requests\UpdateArticuloRequest;
use App\Http\Requests\CreateArticuloRequest;
//Controll and permission package spatie
use \Spatie\Permission\Models\Role;
use App\Articulo;
use App\User;
use App\Categoria;
use App\ArticuloCategoria;

class ArticulosController extends Controller
{
    //Muestra todos los articulos
    public function index()
    {
        $articulos = Articulo::orderBy('id', 'desc')->paginate(9);
        return view('index')->with('articulos', $articulos);
    }

    //Muestra un articulo
    public function showArticulo(Articulo $articulo_id)
    {
        return view('articulo')->with('articulo', $articulo_id);
    }

    //Muestra un formulario para crear nuevos articulos
    public function create_article()
    {
        $articulo = new Articulo(); 
        $categorias = Categoria::all();
        return view('articulos.create_edit')->with('categorias', $categorias)->with('articulo', $articulo);
    }

    //Insertar los nuevos articulos en la base de datos
    public function insert_article(CreateArticuloRequest $request)
    {
		$articulo = new Articulo;
        $articulo->fill($request->only('title', 'description', 'content'));/* Atributos que vamos a insertar */
        $articulo->user_id = $request->user()->id; /* Id del user autenticado */
        $articulo->save();

        //Insertar todos las categorias que puede tener un articulo en la tabla articulo_categoria
        $articulo->categorias()->sync($request->categories);

        return redirect()->route('articulos');
    }

    //Muestra un formulario para actualizar un articulo
    public function update(Articulo $articulo_id)
    {
        $categorias = Categoria::all();
        return view('articulos.create_edit')->with('articulo', $articulo_id)->with('categorias', $categorias);
    }

    //Actualizar formulario
    public function update_article( UpdateArticuloRequest $request, Articulo $articulo_id){

        $articulo_id->update($request->only('title', 'description', 'content', 'user_id'));
        //Insertar todos las categorias que puede tener un articulo en la tabla articulo_categoria
        $articulo_id->categorias()->toggle($request->categories);

        return redirect()->route('articulo', ['articulo_id' => $articulo_id->id]);
    }

    //Eliminar un articulo
    public function delete_article(Articulo $articulo_id)
    {
        $articuloCategoria = ArticuloCategoria::where('articulo_id', $articulo_id->id)->delete();
        $articulo_id->delete();
        return redirect()->route('articulos');
    }

}
