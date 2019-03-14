<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function create()
    {
        
        // dd(Comment::all());
        return view('comments.create',[
            'post' => request()->post,
        ]);
    }

    public function store(Request $request)
    {
        // Post::create(request()->all());
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post
        ]);
        return redirect()->route('posts.index');
    }

}
