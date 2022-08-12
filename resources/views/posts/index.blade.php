@extends('layout.app')
@section('title', 'List User')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">body</th>
        <th scope="col">enabled</th>
        <th scope="col">Actions</th>
      </tr>
    </thead>

    <tbody>
        @foreach ($posts as $post)
        <tr>
            <th scope="row">{{$post['id']}}</th>
            <td ><a href="{{route('posts.show' , ['id' =>$post['id'] ])}}">{{$post['title']}}</a></td>
            <td>{{$post['body']}}</td>
            <td>{{$post['enabled']}}</td>
            <td>
                
                <form class="d-inline" action="{{route('posts.edit' , ['id' => $post['id']])}}" method="GET">
                    <button type="submit" class="btn btn-primary">Edit</button>  
                </form>

                <form class="d-inline" action="{{route('posts.destroy' , ['id' => $post['id'] ])}}" method="POST">
                  @method("delete")
                  @csrf
                  <button type="submit" class="btn btn-danger">Delelte</button>
              </form>
              <form class="d-inline" action="{{route('posts.create' , ['id' => $post['id'] ])}}" method="GET">
  
                @csrf
                <button type="submit" class="btn btn-secondary">Create</button>
            </form>
            </td>
        </tr>
        @endforeach 

    </tbody>
  </table>
  <a href="{{ route('posts.restore') }}" class="btn btn-success">Restore All</a>
@endsection

