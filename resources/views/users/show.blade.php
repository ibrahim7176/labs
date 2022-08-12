@extends('layout.app')
@section('title','showUser')
    
@section('content')
    <h1>user Name : {{$user['name']}}</h1>
    <h1>user Email : {{$user['email']}}</h1>
    @foreach ( $user->posts as $post)
        <a href="{{route('posts.show',['id'=>$post['id']])}}">{{$post['title']}}</a>
    @endforeach    


@endsection