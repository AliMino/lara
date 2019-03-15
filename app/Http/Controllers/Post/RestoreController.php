<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RestoreController extends Controller
{
    public function restore()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.index');
    }
}
