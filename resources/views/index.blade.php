<style>
    form{
        display: inline;
    }
    .card{
        height: 320px;
    }
</style>

@extends('layouts.app')

@section('content')

    <div class="row mt-3">

        <div class="col-md-11 mx-auto">

            @foreach($articulos as $articulo)

                <div class="card float-left m-2" style="width: 18rem;">
                    <div class="card-body">
                    <h5 class="card-title text-center"><a href=" {{ route('articulo', ["articulo_id" => $articulo->id]) }} ">{{ $articulo->title}}</a></h5>
                        <h6 class="card-subtitle mb-2 text-muted">Autor: <a  href="{{ route('user_articulos' , [ 'user_id' => $articulo->user_id ]) }}">{{ $articulo->user->name }}</a></h6>
                        <p class="card-text">{{ $articulo->description }}</p>
                        @if(Auth::check())
                            <div class="text-center">
                                @can('edit_post')
                                    <a name="" id="" class="btn btn-primary" href="{{ route('update' , [ 'articulo_id' => $articulo->id ]) }}" role="button">Actualizar</a>
                                @endcan
                                @can('delete_post')
                                    <form action="{{ route('delete_article' , [ 'articulo_id' => $articulo->id ]) }}" method="POST">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                @endcan
                            </div>
                        @endif
                    </div>
                </div>

            @endforeach

        </div>

    </div>

    <hr>

    <div class="row">

        <div class="col-md-11 mx-auto">
            {{$articulos->render()}}
        </div>

    </div>

@endsection