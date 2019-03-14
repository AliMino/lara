<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Comment;
use App\Http\Requests\Post\StorePostRequest;
use App\Http\Requests\Post\UpdatePostRequest;

class PostsController extends Controller
{
    public function index()
    {
        return view('posts.index', [
            // 'posts' => Post::all()
            'posts' => Post::paginate(5)
        ]);
    }

    public function create()
    {
        return view('posts.create',[
            'users' => User::all(),
        ]);
    }

    public function store(StorePostRequest $request)
    {
        // Post::create(request()->all());
        Post::create($request->all());
        return redirect()->route('posts.index');
    }

    public function update(Post $post, UpdatePostRequest $request)
    {
        $post->update($request->all());
        return redirect()->route('posts.index');
    }

    public function destroy($post)
    {
        Post::destroy($post);
        return redirect()->route('posts.index');
    }

    public function edit(Post $post)
    {
        return view('posts.edit', [
            'post' => $post,
            'users' => User::all()
        ]);
    }

    public function show(Post $post)
    {
        $comments = Comment::where('post_id', '=', $post->id)->get()->all();
        // dd($comments);
        return view('posts.show', [
            'post' => $post,
            'comments' => $comments
        ]);
    }

    public function restore()
    {
        Post::onlyTrashed()->restore();
        return redirect()->route('posts.index');
    }
}
