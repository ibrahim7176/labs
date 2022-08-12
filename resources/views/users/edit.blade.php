@extends('layout.app')
@section('title', 'List User')

@section('content')

<form action="{{route('users.update',['id'=>$user['id']])}}" method="POST">
    @method('put')
    @csrf
    <div class="form-group p-2">
      <label class="p-2" for="name">Name</label>
      <input type="name" name="name" class="form-control"  value="{{$user['name']}}" aria-describedby="emailHelp" >
      
    </div>
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">Email</label>
      <input type="email" name="email" class="form-control " value="{{$user['email']}}"  >
    </div>
    <div class="form-group p-2">
      <label  class="p-2" for="exampleInputPassword1" class="p-2">password</label>
      <input type="text" name="password" class="form-control " value="{{$user['password']}}"  >
    </div>
    <button type="submit" class="btn  btn-primary">Submit</button>
  </form>
@endsection

