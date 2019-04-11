<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articulo;
use App\User;
use App\Categoria;
use \Spatie\Permission\Models\Role;
use App\ArticuloCategoria;

class CategoriaController extends Controller
{

    //Create a category
    public function create_category()
    {
        $categorias = Categoria::all();
        return view('category')->with('categorias', $categorias);
    }

    //Insert category
    public function insert_category(Request $request)
    {
        $categoria = new Categoria;
        $categoria->fill($request->only('nombre'));
        $categoria->save();
		return redirect()->route('create_category');
    }

    //Muestra todos los articulos de una categoria
    public function show_categories(Categoria $categoria_id)
    {
        $articulos = Articulo::with('categorias')->where('id', $categoria_id->id)->paginate(9);
        return view('index')->with('articulos' , $articulos);
    }

    //Delete category
    public function delete_category($categoria_id)
    {
        $num_categoria = ArticuloCategoria::where('categoria_id', $categoria_id)->count();
        //Eliminar categoria si no hay ningun articulo con dicha categoria
        if($num_categoria >= 1){
            echo "<script>alert('No se puede eliminar una categoria que esta asignada a un articulo')</script>";
            return redirect()->route('create_category');
        }else{
            $categorias_delete = Categoria::find($categoria_id);
            $categorias_delete->delete();
            return redirect()->route('create_category');
        }
    }

}
