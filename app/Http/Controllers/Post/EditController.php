<?php

namespace App\Http\Controllers\Post;

use App\Post;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EditController extends Controller
{
    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }
}
