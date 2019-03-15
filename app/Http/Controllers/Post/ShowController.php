<?php

namespace App\Http\Controllers\Post;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShowController extends Controller
{
    public function show(Post $post)
    {
        $comments = Comment::where('post_id', '=', $post->id)->get()->all();
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }
}
