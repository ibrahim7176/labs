<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use PhpParser\Node\Expr\Cast\Object_;

class UserController extends Controller
{



    function index()
    {
        $users = user::withCount('posts')->get();

        return view('users.index')->with(['users' => $users]);
    }

    function create()
    {

        return view('users.create');
    }
    function show($id)
    {
        $user = user::find($id);
        return view('users.show')->with(['user' => $user]);
    }
    function store(Request $request)
    {

        $user =  user::create(
            ['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password')]
        );



        return redirect()->route('users.index')->with(['users' => $user]);
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('users.edit')->with(['user' => $user]);
    }
    function update(Request $request, $id)
    {
        $user = User::find($id)->update(
            ['name' => $request->input('name'), 'email' => $request->input('email'), 'password' => $request->input('password')]
        );
        return redirect()->route('users.index')->with(['users' => $user]);
    }
    function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()->route('users.index')->with(['users' => $user]);
    }
}
