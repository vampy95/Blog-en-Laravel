<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

//Para acceder a estas rutas tienes que estar autentificado
Route::group(['middleware' => 'auth'], function(){

    //Solo si tienes el permiso create_post
    Route::group(['middleware' => ['permission:create_post']], function(){
        //Ruta para insertar articulos
        Route::name('insert_articulo')->post('/articulo', 'ArticulosController@insert_article');
        //Ruta para crear articulos
        Route::name('create_articulo')->get('/articulo/crear', 'ArticulosController@create_article');
    });

    //Solo si tienes el permiso edit_post
    Route::group(['middleware' => ['permission:edit_post']], function(){
        //Ruta para para actualizar
        Route::name('update_articulo')->put('/articulo/update/{articulo_id}', 'ArticulosController@update_article');
        //Ruta para mostrar el formulario para actualizar
        Route::name('update')->get('/articulo/edit/{articulo_id}', 'ArticulosController@update');
    });

    //Solo si tienes el permiso delete_post
    Route::group(['middleware' => ['permission:delete_post']], function(){
        //Ruta para borrar un articulo
        Route::name('delete_article')->delete('/articulo/delete/{articulo_id}', 'ArticulosController@delete_article');
    });

    //Solo si tienes el rol super-admin
    Route::group(['middleware' => ['role:super-admin']], function(){
        Route::name('delete_category')->delete('/categoria/delete/{category_id}', 'CategoriaController@delete_category');
        Route::name('insert_category')->post('/categoria/insertar', 'CategoriaController@insert_category');
        Route::name('create_category')->get('/categoria/crear', 'CategoriaController@create_category');
        route::name('table_users')->get('/user/table', 'UserController@table_users');
    });

});

//Ruta principal de la aplicacion
Route::name('articulos')->get('/', 'ArticulosController@index');

//Ruta para mostrar articulos de un usuario
Route::name('user_articulos')->get('/articulos/autor/{user_id}', 'UserController@show_articles_user');

//Ruta para mostrar articulos de una categoria
Route::name('show_categories')->get('/categoria/{categoria_id}', 'CategoriaController@show_categories');

//Ruta para mostrar un articulo
Route::name('articulo')->get('/articulo/{articulo_id}', 'ArticulosController@showArticulo');

//Ruta que se ejecuta cuando hacemos login correcto
Route::get('/home', 'ArticulosController@index')->name('home');
