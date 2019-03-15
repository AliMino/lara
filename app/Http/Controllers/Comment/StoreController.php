<?php

namespace App\Http\Controllers\Comment;

use App\Comment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;

class StoreController extends Controller
{
    public function store(StoreCommentRequest $request)
    {
        Comment::create([
            'comment' => $request->comment,
            'post_id' => $request->post,
            'user_id' => $request->user
        ]);
        return redirect()->route('posts.index');
    }
}
