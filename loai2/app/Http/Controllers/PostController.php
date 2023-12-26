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
        $posts = Post::orderByDesc('id')->get();
        return view('index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $posts = Post::all();
        return view('posts.create', compact('posts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ]);
        $post = new post();
        $post->name = $validator['name'];
        $post->gender = $validator['gender'];
        $post->gender = $validator['birthday'];
        $post->gender = $validator['phone'];
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Thêm thành công!');
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
        $posts = Post::all();
        return view('posts.edit', compact('post', 'posts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $post_id)
    {
        $validator = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birthday' => 'required',
            'phone' => 'required',
        ]);
        $post = post::find($post_id);
        $post->name = $validator['name'];
        $post->gender = $validator['gender'];
        $post->gender = $validator['birthday'];
        $post->gender = $validator['phone'];
        $post->save();
        return redirect()->route('posts.index')->with('success', 'Sửa thành công!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return redirect()->route('posts.index')->with('success', 'Xóa thành công!');
    }
}
