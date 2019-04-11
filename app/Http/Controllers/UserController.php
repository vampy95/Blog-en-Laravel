<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Articulo;
use App\User;
use App\Categoria;
use \Spatie\Permission\Models\Role;
use App\ArticuloCategoria;

class UserController extends Controller
{
    //Table users
    public function table_users()
    {
        //Usuaris con sus roles
        $users = User::with('roles')->get();
        $roles = Role::all();
        return view('users')->with('users', $users)->with('roles', $roles);
    }

    //Muestra todos los articulos de un usuario 
    public function show_articles_user($user_id)
    {
        //Return a collection
        $articulos = Articulo::with('user')->where('user_id', $user_id)->paginate(9);
        return view('index')->with('articulos' , $articulos);
    }


}
