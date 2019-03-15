<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DestroyController extends Controller
{
    public function destroy($post)
    {
        Post::destroy($post);
        return redirect()->route('posts.index');
    }
}
