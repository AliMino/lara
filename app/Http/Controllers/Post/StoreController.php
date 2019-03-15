<?php

namespace App\Http\Controllers\Post;

use App\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Post\StorePostRequest;

class StoreController extends Controller
{
    public function store(StorePostRequest $request)
    {
        // Post::create(request()->all());
        Post::create($request->all());
        return redirect()->route('posts.index');
    }
}
