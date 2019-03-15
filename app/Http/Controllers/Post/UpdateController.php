<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\UpdatePostRequest;

class UpdateController extends Controller
{
    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->all());
        return redirect()->route('posts.index');
    }
}
