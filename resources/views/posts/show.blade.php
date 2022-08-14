@extends('layout.app')
@section('title','showPost')
    
@section('content')
    <h1>post Name : {{$post['title']}}</h1>
    <p>post body : {{$post['body']}}</p>    
    <img src="{{Storage::disk('public')->url($post['image'])}}" >

@endsection