@extends('layouts.app')

@section('content')

    <h1 class="text-center">Table users</h1>

    <div class="row">
        <div class="col-md-11 mx-auto">
            
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rol</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td scope="row"> {{$user->name}} </td>
                            <td>{{ $user->email}}</td>
                            <td>
                                <select class="form-control" name="" id="">
                                    @foreach ($roles as $rol)
                                        @foreach($user->roles as $r)
                                            <option value="{{$r->name}}">{{$rol->name}}</option>
                                        @endforeach
                                    @endforeach
                                </select>
                            <td>
                        </tr>                    
                    @endforeach
                </tbody>
            </table>

        </div>
    </div>

@endsection

