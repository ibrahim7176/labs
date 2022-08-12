@extends('layout.app')
@section('title', 'List User')

@section('content')
<form action="{{route('users.store')}}" method="POST">

    @csrf

    <div class="form-group p-2">
      <label class="p-2" for="exampleInputEmail1">Name</label>
      <input type="name" name="name" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Name">
    </div>
    
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">Email</label>
      <input type="email" name="email" class="form-control "  placeholder="Email">
    </div> 
    
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">password</label>
      <input type="text" name="password" class="form-control "  placeholder="password">
    </div>
    
    <button type="submit" class="btn  btn-primary">Submit</button>
  </form>
@endsection

