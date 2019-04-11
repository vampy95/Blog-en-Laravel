@extends('layouts.app')
    
@section('content')
    <h1 class="text-center">Create category</h1>

    <div class="row">

        <div class="col-md-8 mx-auto">

            {{ Form::open(['route' => 'insert_category', 'method' => 'POST']) }}

                <div class="form-group">
                    <label for="title">Category</label>
                    <input type="text" name="nombre" id="category" class="form-control" placeholder="New category" required>
                </div>

                {{ Form::submit('Send', ['class' => 'btn btn-primary']) }}

            {{ Form::close() }}

        </div>

    </div>

    <div class="row mt-3">
        <div class="col-md-11 mx-auto">
            
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>Nombre</th>
                        <th>Fecha de creacion</th>
                        <th>Fecha de actualizacion</th>
                        <th>Delete category</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categorias as $categoria)
                        <tr>
                            <td>{{ $categoria->id }}</td>
                            <td>{{ $categoria->nombre }}</td>
                            <td>{{ $categoria->created_at }}</td>
                            <td>{{ $categoria->updated_at }}</td>
                            <td>
                                {{ Form::open(['route' => ['delete_category', $categoria->id], 'method' => 'DELETE']) }}
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                {{ Form::close() }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection
