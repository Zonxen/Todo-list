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
        $posts = Post::with('user')->latest()->paginate(10);
        return view('welcome', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Cara ini bisa digunakan dan lebih simple.. namun kurang aman karena tidak menggunakan sistem validasi.
        // Post::create([
        //     'title' => $request->title,
        //     'content'=>$request->content,
        //     'user_id'=>$request->user()->id
        // ]);

        $validated = request()->validate([
            "title" => "required|string|max:255",
            "content" => "required|string"
        ]);
        $request->user()->posts()->create($validated);

        return redirect()->route('home')->with('success', 'Note created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post)
    {
        $validated = request()->validate([
            "title"=>"required|string|max:255",
            "content"=>"required|string"
        ]);
        $post->update($validated);
        return redirect()->route('dashboard')->with('success', 'Note updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
