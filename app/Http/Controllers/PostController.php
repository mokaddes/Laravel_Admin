<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $posts = Post::latest()->paginate(5);
        if(request('search')){
            $posts = Post::latest()
            ->Where('title', 'like', '%' . request('search') . '%')
            ->orWhere('detail', 'like', '%'. request('search') . '%')
            ->leftjoin('users', 'posts.user_id', '=', 'users.id')
            ->select('posts.*', 'users.name')
            ->orWhere('name', 'like', '%'.request('search'). '%')
            ->paginate(5);
        }
        return view('posts.index', compact('posts'))->with('i', ($request->input('page', 1) -1) *5);
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
    public function store(Request $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Poste Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(Auth::user() == $post->user)
        {
            return view('posts.edit', compact('post'));
        }
        else{
            return redirect()->route('posts.index')->with('notify', 'You are not eligable to Edit this Post');
        }

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $post->title = $request->title;
        $post->detail = $request->detail;
        $post->update();
        return redirect()->route('posts.index')->with('success', 'Post Edited Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('delete', 'Post Deleted Successfully');
    }
}
