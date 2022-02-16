<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::get();
        return view('add-blog-post-form', ['posts' => $posts]);
    }
    public function store(Request $req)
    {
        $post = new Post();
        $post->title = $req->title;
        $post->content = $req->content;
        $post->save();
        return redirect('add-blog-post-form')->with('status', 'Blog Post Form Data Has Been inserted');
    }
}
