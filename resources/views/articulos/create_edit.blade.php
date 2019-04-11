@extends('layouts.app')

@section('content')

  @include('partials._errors')

  @if( $articulo->exists )

    <h1 class="text-center">Update article</h1>

    {{ Form::open(['route' => ['update_articulo', $articulo->id], 'method' => 'PUT']) }}

  @else

    <h1 class="text-center">Create article</h1>

    <!-- En caso de error igualar las varibles a su valor anterior al envio del formulario -->
    <div style="height: 1px; visibility: hidden;">
        $articulo->title = old('title')
        $articulo->description =  old('description')
        $articulo->content = old('content')
    </div>

    {{ Form::open(['route' => 'insert_articulo', 'method' => 'POST']) }}

  @endif

        <div class="form-group">
          {{ Form::label('title', 'Title:') }}
          {{ Form::text('title', $articulo->title, ['class' => 'form-control']) }}
        </div>
        
        @foreach ($categorias as $category)
            
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              {{ Form::checkbox('categories[]', $category->id) }} {{$category->nombre}}
            </label>
          </div>

        @endforeach

        <div class="form-group">
          {{ Form::label('description', 'Description:') }}
          <textarea class="form-control" name="description" id="description" rows="3" maxlength="200">{{$articulo->description}}</textarea>
        </div>

        <div class="form-group">
          {{ Form::label('content', 'Content:') }}
          <textarea class="form-control" name="content" id="content" rows="10">{{$articulo->content}}</textarea>
        </div>

        {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}

    {{ Form::close() }}

@endsection
