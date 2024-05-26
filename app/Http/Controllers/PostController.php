<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $posts = Post::all();
        return view('resources.post.index', ['posts' => $posts]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('resources.post.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->merge([
            'status' => $request->has('status') ? 1 : 0
        ]);

        $request->validate([
            'subject' => 'required|string|max:255',
            'post' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        Post::create([
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => $request->status
        ]);

        return redirect()->route('post.index')->with('message', 'Post Successfully Saved!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('resources.post.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('resources.post.edit', ['post' => $post]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $request->merge([
            'status' => $request->has('status') ? 1 : 0
        ]);

        $request->validate([
            'subject' => 'required|string|max:255',
            'post' => 'required|string',
            'status' => 'nullable|boolean',
        ]);

        $post->update([
            'subject' => $request->subject,
            'post' => $request->post,
            'status' => $request->status
        ]);

        return redirect()->route('post.index')->with('message', 'Post Successfully Saved!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('post.index')->with('message', 'Post Successfully Deleted!');
    }
}