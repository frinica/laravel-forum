<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $input = $request->all();
        $request->validate([
            'post_id' => 'required',
            'name' => 'required',
            'comment'=>'required',
        ]);
        Comment::create($input);
        return back();
    }
}
