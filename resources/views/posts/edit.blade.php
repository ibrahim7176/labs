@extends('layout.app')
@section('title', 'List User')

@section('content')

<form action="{{route('posts.update',['id'=>$post['id']])}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group p-2">
      <label class="p-2" for="name">title</label>
      <input type="name" name="title" class="form-control"  value="{{$post['title']}}" aria-describedby="emailHelp" >
      
    </div>
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">body</label>
      <input type="text" name="body" class="form-control " value="{{$post['body']}}"  >
    </div>
    <div class="form-group p-2">
      <label  class="p-2"  class="p-2">enabled</label>
      <input type="text" name="enabled" class="form-control " value="{{$post['enabled']}}"  >
    </div>
    <button type="submit" class="btn  btn-primary">Edite</button>
  </form>
@endsection

