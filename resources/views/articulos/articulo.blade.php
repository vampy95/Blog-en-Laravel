@extends('layouts.app')

@section('content')

    <h1 class="text-center mt-3">{{ $articulo->title}}</h1>
    <h5 class="text-center"><a href=" {{ route('user_articulos' , ["user_id" => $articulo->user->id]) }} ">{{ $articulo->user->name}}</a></h5>
    <hr>
    <p>{{ $articulo->content }}</p>
    <hr>
    @foreach ($articulo->categorias as $categoria)
        <a href="{{route('show_categories', ["categoria_id" => $categoria->id])}}">{{ $categoria->nombre}}</a>
    @endforeach

@endsection