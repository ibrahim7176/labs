<?php

namespace App\Http\Controllers;

use App\Http\Requests\ValidatedData;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\Console\Input\Input;

class postController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post = Post::with('user')->get();

        return view('posts.index')->with(['posts' => $post]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ValidatedData $request)
    {

        $image = $request->file('image')->store('images', 'public');
        $post =  post::create(
            ['title' => $request->input('title'), 'body' => $request->input('body'), 'enabled' => $request->input('enabled'), 'user_id' => $request->input('user_id'), 'image' => $image]
        );

        return redirect()->route('posts.index')->with(['post' => $post]);
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        if (!$post) return 'not found';

        return view('posts.show')->with(['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        if (Post::find($id)->user_id === auth()->user()->id) {
            $post = Post::find($id);
            return view('posts.edit')->with(['post' => $post]);
        } else {
            return "<h1>you are not post author</h1>";
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (Post::find($id)->user_id === auth()->user()->id) {
            $post = Post::find($id)->update(
                ['title' => $request->input('title'), 'body' => $request->input('body'), 'enabled' => $request->input('enabled')]
            );
            return redirect()->route('posts.index')->with(['post' => $post]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = post::find($id);
        $post->delete();

        return redirect()->route('posts.index')->with(['post' => $post]);
    }
    public function restore()
    {
        $post = Post::onlyTrashed()->restore();
        return redirect()->route('posts.index')->with(['post' => $post]);
    }
}
