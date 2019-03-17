<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use App\Http\Resources\PostResource;
use App\Http\Requests\Post\StorePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        $postsPerPage = 5;
        return PostResource::collection(Post::paginate($postsPerPage));
    }

    public function show($post)
    {
        return new PostResource(Post::findOrFail($post));
    }

    public function store(StorePostRequest $request)
    {
        Post::create($request->all());
        return response()->json([
            'message' => 'Post Created'
        ],201);
    }
}
