@extends('layout.app')
@section('title', 'List User')

@section('content')
<form action="{{route('posts.store')}}" method="POST">

    @csrf

    <div class="form-group p-2">
      <label class="p-2" for="exampleInputEmail1">title</label>
      <input type="text" name="title" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    </div>
    
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">body</label>
      <input type="text" name="body" class="form-control "  >
    </div> 
    
    <div class="form-group p-2">
      <label  class="p-2"  class="p-2">enabled</label>
      <input type="text" name="enabled" placeholder="on or off" >
    </div>
    
    <button type="submit" class="btn  btn-primary">Submit</button>
  </form>
@endsection
