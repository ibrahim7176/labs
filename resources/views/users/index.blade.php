{{-- @extends('layouts.navigation') --}}
@extends('layout.app')
@section('title', 'List User')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">posts count</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($users as $user)
        <tr>
            <th scope="row">{{$user['id']}}</th>
            <td ><a href="{{route('users.show' , ['id' =>$user['id'] ])}}">{{$user['name']}}</a></td>
            <td>{{$user['email']}}</td>
            <td>{{$user->posts_count}}</td>
            <td>
                
                <form class="d-inline" action="{{route('users.edit' , ['id' => $user['id']])}}" method="GET">
                    <button type="submit" class="btn btn-primary">Edit</button>  
                </form>

                <form class="d-inline" action="{{route('users.destroy' , ['id' => $user['id'] ])}}" method="POST">
                    @method("delete")
                    @csrf
                    <button type="submit" class="btn btn-danger">Delelte</button>
                </form>
            </td>
        </tr>
        @endforeach 

    </tbody>
  </table>
@endsection

