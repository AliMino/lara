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
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post,
            'user_id' => $request->user
        ]);
        return redirect()->route('posts.index');
    }

}
